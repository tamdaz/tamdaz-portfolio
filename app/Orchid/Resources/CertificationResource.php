<?php

namespace App\Orchid\Resources;

use App\Models\Certification;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class CertificationResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Certification::class;

    public static function nameWithoutResource(): string
    {
        return 'Certificats';
    }

    public static function description(): ?string
    {
        return 'Ensemble de certificats obtenus';
    }

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(): array
    {
        return [
            Input::make('primary')->title('Texte primaire'),
            Input::make('secondary')->title('Texte secondaire'),
            Upload::make('certificate_id')
                ->title('Image du certificat / preuve')
                ->acceptedFiles('application/pdf'),
            CheckBox::make('has_certificate')->title('A un certificat ?')->sendTrueOrFalse(),
        ];
    }

    public function rules(Model $model): array
    {
        return [
            'primary' => 'required',
            'secondary' => 'required',
            'certificate_id' => 'required',
            'has_certificate' => 'required',
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
            TD::make('primary', 'Texte primaire'),
            TD::make('secondary', 'Texte secondaire'),
            TD::make('has_certificate', 'A un certificat ?'),
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
            Sight::make('primary', 'Texte primaire'),
            Sight::make('secondary', 'Texte secondaire'),
            Sight::make('has_certificate', 'A un certificat ?'),
        ];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(): array
    {
        return [

        ];
    }

    public function save(ResourceRequest $request, Model|Certification $model): void
    {
        $model->has_certificate = $request->input('has_certificate');
        $model->primary = $request->input('primary');
        $model->secondary = $request->input('secondary');
        $model->certificate_id = intval($request->input('certificate_id')[0]);

        $model->save();

        $model->attachment()->syncWithoutDetaching(
            $request->input('certificate_id', [])
        );
    }

    public function delete(Model|Certification $model): void
    {
        $model->certificate()->delete();
        $model->delete();
    }
}
