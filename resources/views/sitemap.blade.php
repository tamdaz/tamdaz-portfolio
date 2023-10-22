@extends('layouts.classic')

@section('container')
	<h1 class="text-4xl md:text-7xl mt-4 mb-8">Plan du site</h1>
	<ul>
		@foreach($sitemap as $route)
			<li>
				<a class="hover:underline" href="{{ $route->loc }}">{{ $route->loc }}</a>
			</li>
		@endforeach
	</ul>
@endsection