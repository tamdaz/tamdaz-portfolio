@extends('layouts.admin')

@section('title', "Ensemble d'expériences")

@section('content')
    <h1 class="text-5xl font-bold mb-4">Ensemble d'expériences</h1>
    <div class="flex flex-col items-end">
        <x-button route="{{ route('admin.experiences.create') }}">Ajouter une expérience</x-button>
    </div>

    @if (session('success'))
        <x-alert type="success" :primary="session('success')" />
    @endif

    <x-admin-list
        type="experience"
        :lists="$experiences"
        :showStatus="false"
        primaryName="fulldate"
        secondaryName="description"
    />
@endsection
