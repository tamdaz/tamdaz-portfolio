@extends('layouts.admin')

@section('title', 'Ensemble de compétences')

@section('content')
    <h1 class="text-5xl font-bold mb-4">Ensemble de compétences</h1>
    <div class="flex flex-col items-end">
        <x-button route="{{ route('admin.skills.create') }}">Ajouter une compétence</x-button>
    </div>
    @if (session('success'))
        <x-alert type="success" :primary="session('success')" />
    @endif

    <x-admin-list
        type="skill"
        :lists="$skills"
        :showStatus="false"
        primaryName="text_primary"
        secondaryName="text_secondary"
    />
@endsection
