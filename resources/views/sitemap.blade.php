@extends('layouts.classic')

@section('title', "Plan du site - Tamda Zohir")

@section('container')
	<h1 class="text-4xl md:text-7xl mt-4 mb-8">Plan du site</h1>
	<p>
		Le plan du site permet de rendre visible les pages accessibles pour les utilisateurs. Ce qui permet de
		mieux s'y retrouver.
	</p>
	<ul>
		<li>
			<a class="underline hover:font-semibold" href="{{ route('pages.home') }}">Accueil</a>
		</li>
		<li>
			<a class="underline hover:font-semibold" href="{{ route('pages.bts-sio') }}">BTS SIO</a>
		</li>
		<li>
			<a class="underline hover:font-semibold" href="{{ route('pages.blogs') }}">Blogs</a>
		</li>
		<ul class="ml-6">
			@foreach($categories as $category)
				<li>{{ $category->name }}</li>
				<ul class="ml-6">
					@forelse($category->blogs as $blog)
						<li>
							<a class="underline hover:font-semibold" href="{{ route('pages.blogs.show', ['blog' => $blog]) }}">{{ $blog->title }}</a>
						</li>
					@empty
						<li>Pas de blogs liés à cette catégorie</li>
					@endforelse
				</ul>
			@endforeach
		</ul>
	</ul>
@endsection