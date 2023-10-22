<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Models\Experience;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.experiences.index', [
            'experiences' => Experience::all()->except(['created_at', 'updated_at'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExperienceFormRequest $request): RedirectResponse
    {
        Experience::create($request->all());

        return redirect()->route('admin.experiences.index')->with('success', "Votre expérience a bien été ajoutée");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.experiences.edit', [
            'experience' => Experience::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExperienceFormRequest $request, string $id): RedirectResponse
    {
        Experience::findOrFail($id)->update($request->all());

        return redirect()->route('admin.experiences.index')->with('success', "Votre expérience a bien été mis à jour");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Experience::findOrFail($id)->delete();

        return redirect()->route('admin.experiences.index');
    }
}
