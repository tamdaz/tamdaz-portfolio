<?php

namespace App\Http\Controllers\Admin\Resources;

use File;
use Exception;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProjectFormRequest;
use Illuminate\Http\{RedirectResponse, UploadedFile};

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.projects.index', [
            'projects' => Project::all()->except(['created_at', 'updated_at'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectFormRequest $request): View|RedirectResponse
    {
        try {
            /**
             * @var UploadedFile $thumbnail
             */
            $thumbnail = $request->file('project_thumb')->store('thumbnail', 'public');

            Project::create([
                ...$request->all(),
                'project_thumb' => Storage::url('thumbnail/' . basename($thumbnail)),
                'is_published' => $request->filled('is_published')
            ]);

        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->route('admin.projects.index')->with('success', "Le projet a bien été créé");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.projects.edit', [
            'project' => Project::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectFormRequest $request, string $id): View|RedirectResponse
    {
        try {
            /**
             * @var UploadedFile $thumbnail
             */
            $thumbnail = $request->file('project_thumb');
            $project = Project::find($id);

            if ($thumbnail !== null) {
                File::delete(substr($project->project_thumb, 1));
                $file_store = $thumbnail->store('thumbnail', 'public');

                $project->update([
                    ...$request->all(),
                    'project_thumb' => Storage::url('thumbnail/' . basename($file_store)),
                    'is_published' => $request->boolean('is_published')
                ]);
            } else {
                $project->update([
                    ...$request->all(),
                    'is_published' => $request->boolean('is_published')
                ]);
            }
        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->route('admin.projects.index')->with('success', "Le projet a bien été mis à jour");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $project = Project::findOrFail($id);

        if (File::exists(substr($project->project_thumb, 1))) {
            File::delete(substr($project->project_thumb, 1));
        }

        $project->delete();

        return redirect()->back();
    }
}
