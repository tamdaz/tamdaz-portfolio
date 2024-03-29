@extends('layouts.classic')

@section('title', $blog['title'] . " - Tamda Zohir Portfolio")

@section('head')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github-dark-dimmed.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

	<script>
        hljs.highlightAll()
	</script>
@endsection

@section('container')
	<div class="flex flex-row">
		<div>
			<header>
				<h1 class="block font-bold text-5xl">
					<a href="/blogs"><-</a>
					{{ $blog['title'] }}
				</h1>
				<span class="flex flex-cols gap-4 items-center mt-4 mb-6">
					<span class="py-2 px-4 bg-green-700 text-white rounded-full">{{ $blog->category->name }}</span>
					<span>Publié {{ $blog['created_at']->diffForHumans() }}</span>
				</span>
				<img class="mb-4 rounded-lg" src="{{ optional($blog->thumbnail)->url }}" width="100%" alt="thumbnail" />
			</header>
			<div class="flex flex-row">
				<article class="blocks w-full mt-2 mb-6 text-justify leading-relaxed markdown" id="article">
					{!! Blade::render((new ParsedownExtra())->text($blog['content'])) !!}
				</article>
			</div>
		</div>
		<x-summary id="article" />
	</div>
@endsection
