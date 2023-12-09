<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileFormRequest;
use App\Models\Profile;
use App\Services\FileUploader;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
    public function update(ProfileFormRequest $request, FileUploader $fileUploader): RedirectResponse
    {
        $profile = Profile::firstOrFail();

        $fileUploader->update('img_profile', $profile->img_profile, 'profiles', function ($canStore, $img_profile) use ($profile, $request) {
            $thumb_img = $canStore === true ? Storage::url('profiles/' . basename($img_profile)) : $profile->$img_profile;

            if ($thumb_img !== null) {
                $profile->update([
                    ...$request->all(),
                    'img_profile' => $thumb_img,
                ]);
            } else {
                $profile->update([...$request->all()]);
            }
        });

        return redirect()->route('admin.profile.edit')->with('success', 'Votre profil a bien été mis à jour');
    }
}
