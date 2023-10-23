@extends('layouts.admin')

@section('title', "Créer un blog")

@section('head')
    @vite('resources/js/md/markdown-editor.js')
@endsection

@section('content')
    <h1 class="text-5xl font-bold">Créer un blog</h1>
    <form class="mt-4" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col">
                <label class="mb-2" for="title">Titre</label>
                <input class="px-4 py-2 border" name="title" type="text" value="{{ old('title') }}" />
                @error('title') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label class="mb-2" for="blog_thumb">Miniature</label>
                <input class="py-2" name="blog_thumb" type="file" />
                @error('blog_thumb') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex flex-col mt-3">
            <label class="mb-2" for="description">Description</label>
            <input class="px-4 py-2 border" name="description" type="text" value="{{ old('description') }}" />
            @error('description') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mt-3 flex flex-row justify-start items-center">
            <label class="pr-2" for="is_published">Est publié ?</label>
            <input name="is_published" type="checkbox" value="true" />
        </div>
        <div class="flex flex-col mt-3">
            <label class="mb-2" for="description">Catégorie</label>
            <select name="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col mt-3">
            <label class="mb-2" for="content">Contenu</label>
            <textarea class="px-4 py-2 border h-[250px]" name="content" type="text" id="mdEditor">{{ old('content') }}</textarea>
            @error('content') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
        </div>
        <x-button class="w-full mt-5">Publier</x-button>
    </form>
@endsection
