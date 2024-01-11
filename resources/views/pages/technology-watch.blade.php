@extends('layouts.classic-full')

@section('title', 'Tamda Zohir - Portfolio BTS SIO SLAM - Veille technologique')

@section('container')
	@vite('resources/js/glitch.js')
	<div class="w-screen h-screen flex justify-center items-center absolute animate-pulse">
		<img class="opacity-50" src="/img/rasberry-pi.svg" alt="rasberry" id="rasberry" />
	</div>
	<div class="w-screen h-screen flex flex-col justify-center items-center relative animate-zoom-avatar">
		<h1 class="text-6xl font-bold text-pink-300 drop-shadow-2xl">Veille technologique</h1>
		<p class="my-4">
			La thématique choisie est le Raspberry
		</p>
	</div>
@endsection
