@extends('layouts.classic')

@section('title', $blog['title'])

@section('head')
	@vite('resources/js/md/markdown-parse.js')

	<link rel="stylesheet" href="https://unpkg.com/highlightjs-copy/dist/highlightjs-copy.min.css" />
	<script src="https://unpkg.com/highlightjs-copy/dist/highlightjs-copy.min.js"></script>
@endsection

@section('container')
	<div class="flex flex-cols">
		<div>
			<div>
				<h1 class="block font-bold text-5xl">
					{{ $blog['title'] }}
				</h1>
				<span class="block mt-3 mb-4">
					Publié {{ $blog['created_at']->diffForHumans() }}
				</span>

				<img class="mb-4 rounded-lg" src="{{ $blog['project_thumb'] ?? $blog['blog_thumb'] }}" width="100%" alt="thumbnail" />

				@if(isset($blog['project_thumb']))
					<span>
					Lien du projet:
						<a class="text-blue-600 hover:underline" href="{{ $blog['project_url'] }}">
							{{ $blog['project_url'] }}
						</a>
					</span>
				@endif
			</div>
			<div class="flex flex-cols">
				<article class="block w-full mt-2 mb-6 text-justify leading-relaxed text-lg markdown" id="article">
					@php
						$Extra = new ParsedownExtra();

						echo $Extra->text($blog['content'])
					@endphp
				</article>
				<x-summary id="article" />
			</div>
		</div>
	</div>
@endsection
