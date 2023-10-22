@extends('layouts.admin')

@section('title', "Ajouter une expérience")

@section('content')
    <h1 class="text-5xl font-bold">Ajouter un expérience</h1>
    <form class="mt-4" action="{{ route('admin.experiences.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col">
                <label class="mb-2" for="date_start">Date de début</label>
                <input class="px-4 py-2 border" name="date_start" type="date" value="{{ old('date_start') }}" />
                @error('date_start') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label class="mb-2" for="date_fin">Date de fin</label>
                <input class="px-4 py-2 border" name="date_end" type="date" value="{{ old('date_end') }}" />
                @error('date_end') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex flex-col">
            <label class="my-2" for="description">Description</label>
            <input class="px-4 py-2 border" name="description" type="text" value="{{ old('description') }}" />
            @error('description') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
        </div>
        <x-button class="w-full mt-5">Ajouter</x-button>
    </form>
@endsection
