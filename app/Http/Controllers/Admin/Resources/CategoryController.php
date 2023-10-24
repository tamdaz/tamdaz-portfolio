<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request): RedirectResponse
    {
        Category::create([
            'name' => $request->get('name'),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Votre catégorie a bien été ajoutée');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.categories.edit', [
            'category' => Category::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, string $id): RedirectResponse
    {
        Category::findOrFail($id)->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Votre catégorie a bien été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('admin.categories.index');
    }
}
