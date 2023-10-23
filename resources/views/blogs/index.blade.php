@extends('layouts.classic')

@section('title', "Blogs")

@section('container')
	<h1 class="text-4xl md:text-7xl mt-4 mb-8">Blogs</h1>

	@livewire('blog-search', [
		'model' => \App\Models\Blog::class,
		'thumbName' => 'blog_thumb',
		'routePrefix' => 'pages.blogs'
	])
@endsection
