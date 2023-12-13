@extends('layouts.classic')

@section('title', $blog['title'])

@section('head')
	@vite('resources/js/md/markdown-parse.js')
@endsection

@section('container')
	<header>
		<h1 class="block font-bold text-5xl">
			{{ $blog['title'] }}
		</h1>
		<span class="flex flex-cols gap-4 items-center mt-4 mb-6">
			Publié {{ $blog['created_at']->diffForHumans() }}
			<span>
				<span class="py-2 px-4 bg-green-700 text-white rounded-full">{{ $blog->category->name }}</span>
			</span>
		</span>
		<img class="mb-4 rounded-lg" src="{{ $blog->attachment()->first()->url() }}" width="100%" alt="thumbnail" />
	</header>
	<div class="flex flex-row">
		<article class="block w-full mt-2 mb-6 text-justify leading-relaxed text-lg markdown" id="article">
			@php echo (new ParsedownExtra())->text($blog['content']) @endphp
		</article>
		<x-summary id="article" />
	</div>
@endsection
