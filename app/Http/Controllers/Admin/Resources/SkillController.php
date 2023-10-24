<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillFormRequest;
use App\Models\Skill;
use App\Services\FileUploader;
use Exception;
use File;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.skills.index', [
            'skills' => Skill::all()->except(['created_at', 'updated_at']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillFormRequest $request, FileUploader $fileUploader): RedirectResponse
    {
        $fileUploader->upload('img_skill', 'img_skills', function ($img_skill) use ($request) {
            Skill::create([
                ...$request->all(),
                'img_skill' => Storage::url('img_skills/'.basename($img_skill)),
            ]);
        });

        return redirect()->route('admin.skills.index')->with('success', 'Votre compétence a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.skills.edit', [
            'skill' => Skill::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, FileUploader $fileUploader): RedirectResponse
    {
        $skill = Skill::find($id);
        $skill_img = $skill->img_skill;

        $fileUploader->update('img_skill', $skill_img, 'img_skill', function ($canStore, $img_skill) use ($skill, $request) {
            $img = $canStore === true ? Storage::url('img_skill/'.basename($img_skill)) : $skill->img_skill;

            $skill->update([
                ...$request->all(),
                'img_skill' => $img,
            ]);
        });

        return redirect()->route('admin.blogs.index')->with('success', 'Votre compétence a bien été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $skill = Skill::findOrFail($id);

            if (File::exists(substr($skill->img_skill, 1))) {
                File::delete(substr($skill->img_skill, 1));
            }

            $skill->delete();
        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->back();
    }
}
