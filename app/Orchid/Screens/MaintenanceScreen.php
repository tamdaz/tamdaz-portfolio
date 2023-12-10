<?php

namespace App\Orchid\Screens;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;

class MaintenanceScreen extends Screen
{
    /**
     * @var Maintenance
     */
    public $maintenance;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'maintenance' => Maintenance::first()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Maintenance';
    }

    public function description(): ?string
    {
        return 'Envoyer un message aux clients lors de la maintenance.';
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
                TextArea::make('message')->title('Motif')->value($this->maintenance->message ?? null),
                DateTimer::make('end_maintenance')->title('Date et heure de fin')->enableTime()->value($this->maintenance->end_maintenance ?? null),
                Button::make('Submit')->type(Color::BASIC)->method('submitForm'),
            ]),
        ];
    }

    /**
     * @throws ValidationException
     */
    public function submitForm(Request $request): void
    {
        $validator = Validator::make($request->all(), [
            'end_maintenance' => ['required']
        ]);

        $validator->validated();

        if (Maintenance::find(1) === null) {
            Maintenance::create($request->all())->save();
        } else {
            Maintenance::find(1)->update($request->all());
        }

        Alert::success('Votre motif a bien été mis à jour');
    }
}
