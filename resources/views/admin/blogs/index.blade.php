@extends('layouts.admin')

@section('title', 'Ensemble de blogs')

@section('content')
    <h1 class="text-5xl font-bold mb-4">Ensemble de blogs</h1>
    <div class="flex flex-col items-end">
        <x-button route="{{ route('admin.blogs.create') }}">Créer un blog</x-button>
    </div>
    @if (session('success'))
        <x-alert type="success" :primary="session('success')" />
    @endif

    <x-admin-list
        type="blog"
        :lists="$blogs"
        :showStatus="true"
        primaryName="title"
        secondaryName="description"
    />
@endsection
