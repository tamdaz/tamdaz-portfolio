<?php

namespace App\Orchid\Resources;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class CategoryResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Category::class;

    public static function nameWithoutResource(): string
    {
        return 'Catégories';
    }

    public static function description(): ?string
    {
        return 'Ensemble de catégories';
    }

    public function rules(Model $model): array
    {
        return [
            'name' => ['required', 'max:50'],
        ];
    }

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(): array
    {
        return [
            Input::make('name')->title('Nom'),
            Select::make('used_for')->title('Utilisé pour')->options([
                'reports' => 'Comptes rendus',
                'blogs' => 'Blogs',
            ]),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),
            TD::make('name', 'Nom'),
            TD::make('used_for', 'Utilisé pour'),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('name', 'Nom'),
            Sight::make('blogs', 'Nombre de comptes-rendus')->render(
                fn (Category $category) => $category->reports->count()
            ),
            Sight::make('blogs', 'Nombre de blogs')->render(
                fn (Category $category) => $category->blogs->count()
            ),
        ];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(): array
    {
        return [];
    }
}
