@extends('layouts.classic')

@section('title', 'Tamda Zohir - Portfolio BTS SIO SLAM')

@section('container')
	<h1 class="text-4xl md:text-7xl mb-8 font-bold animate-title-anim">Comptes-rendus</h1>
	<p>Voici l'ensemble de comptes-rendus effectués.</p>
	<div class="tz-list">
		@forelse($reports as $report)
			<a href="{{ $report->file->url }}" class="tz-list-item">
				<div>
					<h2 class="text-2xl font-bold">{{ $report->title }}</h2>
					<p>Créé le {{ \Carbon\Carbon::parse($report->file_created_at)->translatedFormat('d F Y') }}</p>
					<span class="inline-block bg-green-700 px-4 py-1 rounded-full mt-2 text-white">
						{{ $report->category->name }}
					</span>
				</div>
			</a>
		@empty
			<h2 class="text-center text-2xl my-8 grid-cols-2">Pas de comptes-rendus publiés pour le moment...</h2>
		@endforelse
	</div>
@endsection