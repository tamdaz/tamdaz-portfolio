@extends('layouts.admin')

@section('title', 'Ensemble de projets')

@section('content')
    <h1 class="text-5xl font-bold mb-4">Ensemble de projets</h1>
    <div class="flex flex-col items-end">
        <x-button route="{{ route('admin.projects.create') }}">Créer un projet</x-button>
    </div>
    @if (session('success'))
        <x-alert type="success" :primary="session('success')" />
    @endif
    <x-admin-list
        type="project"
        :lists="$projects"
        :showStatus="true"
        primaryName="title"
        secondaryName="description"
    />
@endsection
