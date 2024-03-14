<?php

namespace App\Orchid\Resources;

use App\Models\TW;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Filters\DefaultSorted;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class TWResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = TW::class;

    public static function nameWithoutResource(): string
    {
        return 'Veille technologique';
    }

    public static function singularLabel(): string
    {
        return 'Veille technologique';
    }

    public function rules(Model $model): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required',
            'source_url' => 'required',
			'source' => 'required',
			'published_at' => 'required'
        ];
    }

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(): array
    {
        return [
            Input::make('title')->title('Titre')->type('text'),
            Input::make('description')->title('Description')->type('text'),
            Input::make('image_url')->title("URL de l'image")->type('url'),
            Input::make('source_url')->title('URL de la source')->type('url'),
            Input::make('source')->title('Source')->type('text'),
			DateTimer::make('published_at')->title("Date de publication")->enableTime(false)
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
            TD::make('title'),
            TD::make('description'),
            TD::make('source'),
            TD::make('published_at', 'Date de publication')
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
            Sight::make('title'),
            Sight::make('description'),
			Sight::make('source'),
            Sight::make('published_at', 'Date de publication')->render(
                fn (TW $tw) => $tw->created_at->toDateTimeString()
            )
        ];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(): array
    {
        return [
            new DefaultSorted('published_at', 'desc'),
        ];
    }
}
