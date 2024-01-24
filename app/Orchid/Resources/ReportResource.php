<?php

namespace App\Orchid\Resources;

use App\Models\Category;
use App\Models\Report;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class ReportResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Report::class;

    public static function nameWithoutResource(): string
    {
        return 'Comptes-rendu';
    }

    public static function description(): ?string
    {
        return 'Ensemble de comptes-rendus';
    }

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(): array
    {
        return [
            Input::make('title')->title('Titre'),
            Select::make('category_id')
                ->title('Catégorie')
                ->options(Category::usedFor('reports')->pluck('name', 'id')),
            Upload::make('report_id')
                ->title('Document')
                ->maxFiles(1)
                ->acceptedFiles('application/pdf'),
            DateTimer::make('file_created_at')
                ->title('Date de création du compte-rendu'),
        ];
    }

    public function rules(Model $model): array
    {
        return [
            'title' => 'required',
            'category_id' => 'required',
            'report_id' => 'required',
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
            TD::make('title', 'Titre'),
            TD::make('category_id', 'Catégorie'),
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
            Sight::make('title', 'Title'),
            Sight::make('category_id', 'Catégorie'),
        ];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(): array
    {
        return [];
    }

    public function save(ResourceRequest $request, Model|Report $model): void
    {
        $model->title = $request->input('title');
        $model->category_id = $request->input('category_id');
        $model->report_id = intval($request->input('report_id')[0]);
        $model->file_created_at = $request->input('file_created_at');

        $model->save();

        $model->attachment()->syncWithoutDetaching(
            $request->input('report_id', [])
        );
    }

    public function delete(Model|Report $model): void
    {
        $model->file()->delete();
        $model->delete();
    }
}
