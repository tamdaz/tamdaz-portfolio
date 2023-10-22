@extends('layouts.classic')

@section('title', "Mon profil")

@section('container')
    <h1 class="text-4xl md:text-7xl mt-4 mb-8">Profil</h1>
    <p class="text-justify leading-8 mt-6 text-xl">
        {{ $profile->content }}
    </p>
@endsection
