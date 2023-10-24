<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogFormRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Services\FileUploader;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::with('category')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.blogs.create', [
            'categories' => Category::select(['id', 'name'])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogFormRequest $request, FileUploader $fileUploader): RedirectResponse
    {
        $fileUploader->upload('blog_thumb', 'thumbnail', function ($thumbnail) use ($request) {
            Blog::create([
                ...$request->all(),
                'blog_thumb' => Storage::url('thumbnail/'.basename($thumbnail)),
                'is_published' => $request->filled('is_published'),
                'category_id' => $request->get('category'),
            ]);
        });

        return redirect()->route('admin.blogs.index')->with('success', 'Le blog a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.blogs.edit', [
            'blog' => Blog::with('category')->find($id),
            'categories' => Category::select(['id', 'name'])->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogFormRequest $request, FileUploader $fileUploader, string $id): RedirectResponse
    {
        $blog = Blog::find($id);
        $thumb = $blog->blog_thumb;

        $fileUploader->update('blog_thumb', $thumb, 'thumbnail', function ($canStore, $thumbnail) use ($blog, $request) {
            $thumb_img = $canStore === true ? Storage::url('thumbnail/'.basename($thumbnail)) : $blog->blog_thumb;

            $blog->update([
                ...$request->all(),
                'blog_thumb' => $thumb_img,
                'is_published' => $request->boolean('is_published'),
                'category_id' => $request->get('category'),
            ]);
        });

        return redirect()->route('admin.blogs.index')->with('success', 'Ce blog a bien été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, FileUploader $fileUploader): RedirectResponse
    {
        $blog = Blog::findOrFail($id);

        $fileUploader->delete($blog->blog_thumb);
        $blog->delete();

        return redirect()->back();
    }
}
