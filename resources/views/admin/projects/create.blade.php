@extends('layouts.admin')

@section('title', "Créer un projet")

@section('head')
    @vite('resources/js/md/markdown-editor.js')
@endsection

@section('content')
    <h1 class="text-5xl font-bold">Créer un projet</h1>
    <form class="mt-4" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col">
                <label class="mb-2" for="title">Titre</label>
                <input class="px-4 py-2 border" name="title" type="text" value="{{ old('title') }}" />
                @error('title') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label class="mb-2" for="project_thumb">Miniature</label>
                <input class="py-2" name="project_thumb" type="file" />
                @error('project_thumb') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col mt-3">
                <label class="mb-2" for="description">Description</label>
                <input class="px-4 py-2 border" name="description" type="text" value="{{ old('description') }}" />
                @error('description') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col mt-3">
                <label class="mb-2" for="project_url">URL du projet</label>
                <input class="px-4 py-2 border" name="project_url" type="text" value="{{ old('project_url') }}" />
                @error('project_url') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mt-3 flex flex-row justify-start items-center">
            <label class="pr-2" for="is_published">Est publié ?</label>
            <input name="is_published" type="checkbox" value="true" />
			@error('is_published') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col mt-3">
            <label class="mb-2" for="content">Contenu</label>
            <textarea class="px-4 py-2 border h-[250px] editor-preview-side" name="content" id="mdEditor" type="text">{{ old('content') }}</textarea>
            @error('content') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
        </div>
        <x-button class="w-full mt-5">Publier</x-button>
    </form>
@endsection
