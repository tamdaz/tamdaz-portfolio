<?php

namespace App\Orchid\Resources;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Components\Cells\Boolean;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class BlogResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var Blog
     */
    public static $model = Blog::class;

    /**
     * Preload relations
     */
    public function with(): array
    {
        return ['category', 'attachment'];
    }

    public function rules(Blog|Model $model): array
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'content' => ['required'],
            'thumbnail_id' => ['required'],
        ];
    }

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(): array
    {
        return [
            Input::make('title')
                ->title('Titre'),
            Input::make('description')
                ->title('Description'),
            Select::make('category_id')
                ->title('Catégorie')
                ->options(Category::usedForBlogs()->pluck('name', 'id')),
            SimpleMDE::make('content')
                ->title('Contenu'),
            Cropper::make('thumbnail_id')
                ->title('Miniature')
                ->width(1280)
                ->height(720)
                ->maxFileSize(2)
                ->targetId(),
            CheckBox::make('is_published')
                ->title('Est publié ?')
                ->sendTrueOrFalse(),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     *
     * @throws \ReflectionException
     */
    public function columns(): array
    {
        return [
            TD::make('id', 'ID'),
            TD::make('is_published', 'Est publié ?')
                ->usingComponent(Boolean::class, true: ' Oui', false: ' Non'),
            TD::make('title'),
            TD::make('category_id', 'Catégorie')->render(
                fn (Blog $model) => $model->category->name ?? "<b style='color: red'>Catégorie non associée</b>"
            ),
            TD::make('created_at', 'Date de création')->render(
                fn (Blog $model) => $model->created_at->toDateTimeString()
            ),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     *
     * @throws \ReflectionException
     */
    public function legend(): array
    {
        return [
            Sight::make('id', 'ID'),
            Sight::make('is_published', 'Est publié ?')
                ->usingComponent(Boolean::class, true: ' Oui', false: ' Non'),
            Sight::make('title', 'Titre'),
            Sight::make('description', 'Description'),
            Sight::make('content', 'Contenu'),
            Sight::make('thumbnail_id', 'Miniature')->render(function (Blog $blog) {
                return <<<HTML
                    <img src="{$blog->attachment()->first()}" alt='img' width='100%' />
                HTML;
            }),
            Sight::make('created_at', 'Date de création')
                ->render(fn (Blog $blog) => $blog->created_at->toDateTimeString()),
        ];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(): array
    {
        return [];
    }

    public function save(ResourceRequest $request, Model|Blog $model): void
    {
        $model->fill($request->all())->save();

        $model->attachment()->syncWithoutDetaching(
            $request->input('thumbnail_id', [])
        );
    }

    public function delete(Model|Blog $model): void
    {
        $model->attachment()->delete();
        $model->delete();
    }
}
