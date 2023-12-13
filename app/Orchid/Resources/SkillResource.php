<?php

namespace App\Orchid\Resources;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class SkillResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Skill::class;

    public function rules(Model $model): array
    {
        return [
            'text_primary' => ['required', 'max:50'],
            'text_secondary' => ['required', 'max:255'],
            'img_skill' => ['required'],
        ];
    }

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(): array
    {
        return [
            Input::make('text_primary')->title('Texte primaire'),
            Input::make('text_secondary')->title('Texte secondaire'),
            Picture::make('img_skill')->title('Image')->targetId(),
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
            TD::make('id', 'ID'),
            TD::make('img_skill', 'Image (ratio: 1/1)')->render(function (Skill $skill) {
                return <<<HTML
                    <img src="{$skill->attachment()->first()->url()}" alt="img_skill" width="64px" />                
                HTML;
            }),
            TD::make('text_primary', 'Texte primaire'),
            TD::make('text_secondary', 'Texte secondary'),
            TD::make('created_at', 'Date de création')
                ->render(fn ($model) => $model->created_at->toDateTimeString()),
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
            Sight::make('img_skill', 'Image')->render(function (Skill $skill) {
                return <<<HTML
                    <img src="{$skill->attachment()->first()->url()}" alt="img_skill" width="64px" />                
                HTML;
            }),
            Sight::make('text_primary', 'Texte primaire'),
            Sight::make('text_secondary', 'Texte secondary'),
            Sight::make('created_at', 'Date de création')
                ->render(fn (Skill $skill) => $skill->created_at->toDateTimeString()),
        ];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(): array
    {
        return [];
    }

    public function save(ResourceRequest $request, Model|Skill $model): void
    {
        $model->fill($request->all())->save();

        $model->attachment()->sync(
            $request->input('img_skill', [])
        );
    }
}
