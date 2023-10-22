@extends('layouts.admin')

@section('title', "Modifier le blog")

@section('head')
    @vite('resources/js/md/markdown-editor.js')
@endsection

@section('content')
    <h1 class="text-5xl font-bold">Modifier le blog</h1>
    <form class="mt-4" action="{{ route('admin.blogs.update', ['blog' => $blog['id']]) }}" enctype="multipart/form-data" method="post">
        @method('PUT')
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <div class="flex flex-col">
                    <label class="mb-2" for="title">Titre</label>
                    <input class="px-4 py-2 border" name="title" type="text" value="{{ old('title') ?? $blog['title'] }}" />
                    @error('title') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col mt-3">
                    <label class="mb-2" for="description">Description</label>
                    <input class="px-4 py-2 border" name="description" type="text" value="{{ old('description') ?? $blog['description'] }}" />
                    @error('description') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mt-3 flex flex-row justify-start items-center">
                    <label class="pr-2" for="is_published">Est publié ?</label>
                    <input name="is_published" type="checkbox" @if($blog['is_published'] === true) checked @endif />
                </div>
                <div class="flex flex-col mt-3">
                    <label class="mb-2" for="content">Contenu</label>
                    <textarea class="px-4 py-2 border h-[200px]" name="content" type="text" id="mdEditor">{{ old('content') ?? $blog['content'] }}</textarea>
                    @error('content') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex flex-col">
                <label class="mb-2" for="blog_thumb">Miniature</label>
                <img src="{{ $blog['blog_thumb'] }}" alt="blog_thumb" />
                <input class="py-2" name="blog_thumb" type="file" value="{{ $blog['blog_thumb'] }}" />
                @error('blog_thumb') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <x-button class="w-full mt-5">Mettre à jour</x-button>
    </form>
@endsection
