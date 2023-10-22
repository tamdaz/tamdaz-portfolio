@extends('layouts.classic')

@section('title', 'Ensemble de composants')

@section('container')
    <h1 class="text-4xl md:text-5xl font-bold text-center mb-4 animate-zoom">Ensemble de composants</h1>

    {{-- Buttons --}}
    <span class="block pb-4">Boutons (buttons)</span>
    <div class="grid grid-cols-3 gap-2">
        {{-- Normal --}}
        <x-button type="contained">Contained</x-button>
        <x-button type="outlined">Outlined</x-button>
        <x-button type="text">Text</x-button>

        {{-- Icons --}}
        <x-button hasIcon="true" type="contained">Contained</x-button>
        <x-button hasIcon="true" type="outlined">Outlined</x-button>
        <x-button hasIcon="true" type="text">Text</x-button>
    </div>

    {{-- Cards --}}
    <span class="block py-4">Cartes (cards)</span>
    <x-card type="normal" title="Title" description="Desc" />
    <div class="grid grid-cols-2 gap-2">
        <x-card type="media" title="Title" description="Desc" src="https://via.placeholder.com/1280x720.png/212121?text=Text" />
        <x-card type="media" title="Title" description="Desc" src="https://via.placeholder.com/1280x720.png/212121?text=Text" />
    </div>
    
    <span class="block py-4">Cartes avec image et texte superposés (cards with image and text superimposed)</span>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <x-card-skill title="Title" description="description" src="https://via.placeholder.com/512x512.png/212121?text=512x512" />
        <x-card-skill title="Title" description="description" src="https://via.placeholder.com/512x512.png/212121?text=512x512" />
        <x-card-skill title="Title" description="description" src="https://via.placeholder.com/512x512.png/212121?text=512x512" />
        <x-card-skill title="Title" description="description" src="https://via.placeholder.com/512x512.png/212121?text=512x512" />
    </div>
    <span class="block py-4">Alertes</span>
    <x-alert type="info" primary="Hello world" secondary="hello world" />
    <x-alert type="success" primary="Hello world" secondary="hello world" />
    <x-alert type="warn" primary="Hello world" secondary="hello world" />
    <x-alert type="error" primary="Hello world" secondary="hello world" />
    <x-alert type="debug" primary="Hello world" secondary="hello world" />

    <span class="block py-4">Chronologie (timeline)</span>
    @php
        $periods = [
            [
                'date_start' => 2012,
                'date_end' => 2012,
                'description' => 'Lorem ipsum dolor sit amet...'
            ], [
                'date_start' => 2012,
                'date_end' => 2012,
                'description' => 'Lorem ipsum dolor sit amet...'
            ], [
                'date_start' => 2012,
                'date_end' => 2012,
                'description' => 'Lorem ipsum dolor sit amet...'
            ],
        ]
    @endphp
    <x-timeline periods="{{ json_encode($periods) }}" />
@endsection