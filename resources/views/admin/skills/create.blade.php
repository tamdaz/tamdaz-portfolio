@extends('layouts.admin')

@section('title', "Ajouter une expérience")

@section('content')
    <h1 class="text-5xl font-bold">Ajouter une expérience</h1>
    <form class="mt-4" action="{{ route('admin.skills.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col">
                <label class="mb-2" for="text_primary">Text primaire</label>
                <input class="px-4 py-2 border" name="text_primary" type="text" value="{{ old('text_primary') }}" />
                @error('text_primary') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label class="mb-2" for="text_secondary">Text secondaire</label>
                <input class="px-4 py-2 border" name="text_secondary" type="text" value="{{ old('text_secondary') }}" />
                @error('text_secondary') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex flex-col">
            <label class="my-2" for="img_skill">Image (ratio 1:1)</label>
            <input class="px-4 py-2" name="img_skill" type="file" />
            @error('img_skill') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
        </div>
        <x-button class="w-full mt-5">Ajouter</x-button>
    </form>
@endsection
