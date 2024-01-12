<?php

namespace App\Orchid\Resources;

use App\Models\Certification;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
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
            Cropper::make('certificate_id')
                ->title('Image du certificat / preuve')
                ->targetId(),
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
        return [];
    }
}
