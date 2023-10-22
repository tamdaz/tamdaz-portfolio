<?php

namespace App\Http\Controllers\Admin\Resources;

use File;
use Storage;
use Exception;
use App\Models\Blog;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogFormRequest;
use Illuminate\Http\{UploadedFile, RedirectResponse};

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::all()->except(['created_at', 'updated_at'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogFormRequest $request): RedirectResponse|Exception
    {
        try {
            /**
             * @var UploadedFile $thumbnail
             */
            $thumbnail = $request->file('blog_thumb')->store('thumbnail', 'public');

            Blog::create([
                ...$request->all(),
                'blog_thumb' => Storage::url('thumbnail/' . basename($thumbnail)),
                'is_published' => $request->filled('is_published')
            ]);

        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->route('admin.blogs.index')->with('success', "Le blog a bien été créé");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.blogs.edit', [
            'blog' => Blog::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogFormRequest $request, string $id): RedirectResponse
    {
        try {
            /**
             * @var UploadedFile $thumbnail
             */
            $thumbnail = $request->file('blog_thumb');
            $blog = Blog::find($id);

            if ($thumbnail !== null) {
                File::delete(substr($blog->blog_thumb, 1));
                $file_store = $thumbnail->store('thumbnail', 'public');

                $blog->update([
                    ...$request->all(),
                    'blog_thumb' => Storage::url('thumbnail/' . basename($file_store)),
                    'is_published' => $request->boolean('is_published')
                ]);
            } else {
                $blog->update([
                    ...$request->all(),
                    'is_published' => $request->boolean('is_published')
                ]);
            }
        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->route('admin.blogs.index')->with('success', "Le blog a bien été mis à jour");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);

        if (File::exists(substr($blog->blog_thumb, 1))) {
            File::delete(substr($blog->blog_thumb, 1));
        }

        $blog->delete();

        return redirect()->back();
    }
}
