<?php

namespace App\Orchid\Resources;

use App\Models\Experience;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class ExperienceResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Experience::class;

    public static function nameWithoutResource(): string
    {
        return 'Expériences';
    }

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(): array
    {
        return [
            Input::make('description')->title('Description'),
            DateTimer::make('date_start')->title('Date de début')->format('Y-m-d'),
            DateTimer::make('date_end')->title('Date de fin')->format('Y-m-d'),
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
            TD::make('description', 'Description'),
            TD::make('date_start', 'Date de début')
                ->render(fn (Experience $model) => $model->created_at->toDateString()),
            TD::make('date_end', 'Date de fin')
                ->render(fn (Experience $model) => $model->created_at->toDateString()),
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
            Sight::make('id', 'ID'),
            Sight::make('description', 'Description'),
            Sight::make('date_start', 'Date de début')->render(fn (Experience $experience) => $experience->date_start->toDateString()),
            Sight::make('date_end', 'Date de fin')->render(fn (Experience $experience) => $experience->date_end->toDateString()),
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
