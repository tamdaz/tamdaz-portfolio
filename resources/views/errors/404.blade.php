@extends('layouts.base')

@section('title', "Erreur 404")

@section('body')
    <div class="w-screen h-screen flex flex-col justify-center items-center">
        <h1 class="animate-zoom text-7xl font-bold">Erreur 404</h1>
        <span class='my-4 text-xl -skew-x-6 before:content-["\"_"] after:content-["_\""]'>C'est l'écran noir, il n'y a plus d'espoir</span>
    </div>
@endsection
