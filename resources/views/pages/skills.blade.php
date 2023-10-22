@extends('layouts.classic')

@section('title', 'Mes compétences')

@section('container')
    <h1 class="text-4xl md:text-7xl mt-4 mb-8">Mes compétences</h1>
    <div class="grid grid-cols-4">
        @foreach ($skills as $skill)
            <x-card-skill
                title="{{ $skill['text_primary'] }}"
                description="{{ $skill['text_secondary'] }}"
                src="{{ $skill['img_skill'] }}" />
        @endforeach
    </div>
@endsection
