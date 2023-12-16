<?php

namespace App\Orchid\Screens;

use App\Http\Requests\ProfileFormRequest;
use App\Models\Profile;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;

class ProfileScreen extends Screen
{
    /**
     * @var Profile
     */
    public $profile;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'profile' => Profile::first(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Profile';
    }

    public function description(): ?string
    {
        return 'Mettre à jour les informations du profil visible pour ce site portfolio.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            \Orchid\Support\Facades\Layout::rows([
                Input::make('name')->title('Nom')->value($this->profile->name),
                Input::make('job')->title('Travail / Rôle')->value($this->profile->job),
                Picture::make('img_profile')->title('Avatar')->value($this->profile->img_profile)->targetId(),
                Button::make('Submit')->type(Color::BASIC)->method('submitForm'),
            ]),
        ];
    }

    public function submitForm(ProfileFormRequest $request): void
    {
        $this->profile->fill($request->all())->save();

        $this->profile->attachment()->sync(
            $request->input('img_profile', [])
        );

        Alert::success('Votre profile a bien été mis à jour');
    }
}
