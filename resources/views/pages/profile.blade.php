@extends('layouts.classic')

@section('title', "Mon profil")

@section('container')
    <h1 class="text-4xl md:text-7xl mt-4 mb-8">A propos de moi</h1>
    <p class="text-justify leading-8 mt-6 text-xl">
        {{ $profile->content }}
    </p>
    <h1 class="text-2xl md:text-4xl mt-4 mb-8">Mes compétences</h1>
    <div class="grid grid-cols-4 gap-4">
        @foreach ($skills as $skill)
            <x-card-skill
                    title="{{ $skill['text_primary'] }}"
                    description="{{ $skill['text_secondary'] }}"
                    src="{{ $skill['img_skill'] }}" />
        @endforeach
    </div>
    <h1 class="text-2xl md:text-4xl mt-4 mb-8">Expériences professionnelles</h1>
    <x-timeline :periods="$periods" />
@endsection
