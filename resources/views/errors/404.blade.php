@extends('layouts.base')

@section('title', "Erreur 404")

@section('body')
    <div class="w-screen h-screen flex flex-col justify-center items-center">
        <h1 class="animate-zoom text-7xl font-bold">Erreur 404</h1>
        <p class="my-4">La page que vous essayez de chercher n'existe pas.</p>
        <x-button route="{{ route('pages.home') }}" type="contained">Retourner à l'accueil</x-button>
    </div>
@endsection
