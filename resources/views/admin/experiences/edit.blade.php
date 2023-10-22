@extends('layouts.admin')

@section('title', "Modifier l'expérience")

@section('content')
    <h1 class="text-5xl font-bold">Modifier l'expérience</h1>
    <form class="mt-4" action="{{ route('admin.experiences.update', ['experience' => $experience['id']]) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col">
                <label class="mb-2" for="date_start">Date de début</label>
                <input class="px-4 py-2 border" name="date_start" type="date" value="{{ date_format(old('date_start') ?? $experience['date_start'], "Y-m-d") }}" />
                @error('date_start') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label class="mb-2" for="date_fin">Date de fin</label>
                <input class="px-4 py-2 border" name="date_end" type="date" value="{{ date_format(old('date_end') ?? $experience['date_end'], "Y-m-d") }}" />
                @error('date_end') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex flex-col">
            <label class="my-2" for="description">Description</label>
            <input class="px-4 py-2 border" name="description" type="text" value="{{ old('description') ?? $experience['description'] }}" />
            @error('description') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
        </div>
        <x-button class="w-full mt-5">Mettre à jour</x-button>
    </form>
@endsection