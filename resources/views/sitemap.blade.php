@extends('layouts.classic')

@section('title', "Tamda Zohir - Portfolio BTS SIO SLAM - Plan du site")

@section('container')
	<h1 class="text-4xl md:text-7xl font-bold mt-4 mb-8">Plan du site</h1>
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
			<a class="underline hover:font-semibold" href="{{ route('pages.certifications') }}">Certifications</a>
		</li>
		<li>
			<a class="underline hover:font-semibold" href="{{ route('pages.tw') }}">Veille technologique</a>
		</li>
		<ul class="ml-6">
			@foreach($tw as $new)
				<li>
					<a class="underline hover:font-semibold" href="{{ $new->source_url }}">{{ $new->title }}</a>
				</li>
			@endforeach
		</ul>
		<li>
			<a class="underline hover:font-semibold" href="{{ route('pages.reports') }}">Comptes-rendus</a>
		</li>
		<ul class="ml-6">
			@foreach($reports as $category)
				<li>{{ $category->name }}</li>
				<ul class="ml-6">
					@forelse($category->reports as $report)
						<li>
							<a class="underline hover:font-semibold" href="{{ $report->file->url }}">
								{{ $report->title }}
							</a>
						</li>
					@empty
						<li>Pas de comptes-rendus liés à cette catégorie</li>
					@endforelse
				</ul>
			@endforeach
		</ul>
		<li>
			<a class="underline hover:font-semibold" href="{{ route('pages.blogs') }}">Blogs</a>
		</li>
		<ul class="ml-6">
			@foreach($blogs as $category)
				<li>{{ $category->name }}</li>
				<ul class="ml-6">
					@forelse($category->blogs as $blog)
						<li>
							<a class="underline hover:font-semibold" href="{{ route('pages.blogs.show', compact('blog')) }}">
								{{ $blog->title }}
							</a>
						</li>
					@empty
						<li>Pas de blogs liés à cette catégorie</li>
					@endforelse
				</ul>
			@endforeach
		</ul>
	</ul>
@endsection