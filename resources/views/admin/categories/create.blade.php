@extends('layouts.admin')

@section('title', "Ajouter une expérience")

@section('content')
    <h1 class="text-5xl font-bold">Ajouter une catégorie</h1>
    <form class="mt-4" action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <div class="flex flex-col">
            <label class="my-2" for="name">Nom</label>
            <input class="px-4 py-2 border" name="name" type="text" value="{{ old('name') }}" />
            @error('name') <span class="py-2 text-red-500">{{ $message }}</span> @enderror
        </div>
        <x-button class="w-full mt-5">Ajouter</x-button>
    </form>
@endsection
