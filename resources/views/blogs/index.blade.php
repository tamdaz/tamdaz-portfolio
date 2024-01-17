@extends('layouts.classic')

@section('title', "Tamda Zohir - Portfolio BTS SIO SLAM - Blogs")

@section('head')
	@livewireStyles
@endsection

@section('container')
	<h1 class="text-4xl md:text-7xl mb-6 font-bold animate-title-anim">Blogs</h1>

	@livewire('blog-search')

	@livewireScripts
@endsection