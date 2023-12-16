@extends('layouts.classic')

@section('title', "Blogs - Tamda Zohir")

@section('container')
	<h1 class="text-4xl md:text-7xl mb-6 animate-title-anim">Blogs</h1>

	@livewire('blog-search', [
		'model' => \App\Models\Blog::class,
		'thumbName' => 'blog_thumb'
	])
@endsection
