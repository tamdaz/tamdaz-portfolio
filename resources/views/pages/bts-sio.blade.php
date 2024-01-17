@extends('layouts.classic')

@section('title', 'Tamda Zohir - Portfolio BTS SIO SLAM')

@section('container')
	<h1 class="text-4xl md:text-7xl mb-8 font-bold animate-title-anim">BTS SIO</h1>
	<article class="markdown">
		@php
			echo (new ParsedownExtra())->text(file_get_contents(public_path('md/btssio.md')))
		@endphp
	</article>
@endsection