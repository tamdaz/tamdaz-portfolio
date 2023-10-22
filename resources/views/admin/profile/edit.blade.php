@extends('layouts.admin')

@section('title', 'Modifier le profil')

@section('head')
    @vite('resources/js/md/markdown-editor.js')
@endsection

@section('content')
    <h1 class="text-5xl font-bold mb-4">Modifier le profil</h1>
    @if (session('success'))
        <x-alert type="success" :primary="session('success')" />
    @endif
    <form class="mt-4" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        <div class="flex flex-row items-center gap-8 my-6">
            <img class="rounded-full" src="{{ $profile['img_profile'] ?? "" }}" width="200px" />
            <div class="flex flex-col">
                <label class="mb-2" for="img_profile">Image</label>
                <input class=" py-2" name="img_profile" type="file" />
                @error('img_profile')
                    <span class="py-2 text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col">
                <label class="mb-2" for="name">Nom et prénom</label>
                <input class="px-4 py-2 border" name="name" type="text"
                    value="{{ old('name') ?? $profile['name'] ?? "" }}" />
                @error('name')
                    <span class="py-2 text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label class="mb-2" for="job">Fonction / Travail</label>
                <input class="px-4 py-2 border" name="job" type="text"
                    value="{{ old('job') ?? $profile['job'] ?? "" }}" />
                @error('job')
                    <span class="py-2 text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col">
            <label class="my-2" for="content">Contenu</label>
            <textarea
                class="px-4 py-2 border h-[200px]"
                name="content"
                id="mdEditor">{{ old('content') ?? $profile['content'] ?? "" }}</textarea>
            @error('content')
                <span class="py-2 text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <x-button class="w-full mt-5">Mettre à jour</x-button>
    </form>
@endsection
