<?php

namespace App\Http\Controllers\Admin\Resources;

use File;
use Exception;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SkillFormRequest;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.skills.index', [
            'skills' => Skill::all()->except(['created_at', 'updated_at'])
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
    public function store(SkillFormRequest $request): RedirectResponse
    {
        try {
            /**
             * @var UploadedFile $img_skill
             */
            $img_skill = $request->file('img_skill')->store('img_skills', 'public');

            Skill::create([
                ...$request->all(),
                'img_skill' => Storage::url('img_skills/' . basename($img_skill))
            ]);

			return redirect()->route('admin.skills.index')->with('success', "Votre compétence a bien été créé");
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.skills.edit', [
            'skill' => Skill::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        try {
            /**
             * @var UploadedFile $img_skill_uf
             */
            $img_skill_uf = $request->file('img_skill');
            $skill = Skill::find($id);

            if ($img_skill_uf !== null) {
                File::delete(substr($skill->img_skill, 1));
                $file_store = $img_skill_uf->store('img_skills', 'public');

                $skill->update([
                    ...$request->all(),
                    'img_skill' => Storage::url('img_skills/' . basename($file_store))
                ]);
            } else {
                $skill->update($request->all());
            }

			return redirect()->route('admin.blogs.index')->with('success', "Votre compétence a bien été mis à jour");
        } catch (Exception $e) {
            dd($e);
        }
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
