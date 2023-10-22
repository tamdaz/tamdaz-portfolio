@extends('layouts.classic')

@php
	use App\Models\{Blog,Project};

    $title = ucfirst($type);

    if ($title === "Projects") {
        $title = "Projets";
    }
@endphp

@section('title', $title)

@section('container')
	<h1 class="text-4xl md:text-7xl mt-4 mb-8">{{ $title }}</h1>

	@if($type === "blogs")
		@livewire('partials-data-content', [
			'model' => Blog::class,
			'thumbName' => 'blog_thumb',
			'routePrefix' => 'pages.blogs'
		])
	@elseif($type === "projects")
		@livewire('partials-data-content', [
			'model' => Project::class,
			'thumbName' => 'project_thumb',
			'routePrefix' => 'pages.projects'
		])
	@endif
@endsection
