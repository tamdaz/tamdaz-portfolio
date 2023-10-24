<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileFormRequest;
use App\Models\Profile;
use Exception;
use File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Storage;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(): View
    {
        return view('admin.profile.edit', [
            'profile' => Profile::first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileFormRequest $request): RedirectResponse
    {
        try {
            /**
             * @var UploadedFile $profile
             */
            $profile = $request->file('img_profile');
            $project = Profile::firstOrFail();

            if ($profile !== null) {
                File::delete(substr($project->img_profile, 1));
                $file_store = $profile->store('profiles', 'public');

                $project->update([
                    ...$request->all(),
                    'img_profile' => Storage::url('profiles/'.basename($file_store)),
                ]);

            } else {
                $project->update($request->all());
            }

            return redirect()->route('admin.profile.edit')->with('success', 'Votre profil a bien été mis à jour');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
