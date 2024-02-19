@extends('layouts.classic')

@section('title', 'Certifications - Tamda Zohir - Portfolio BTS SIO SLAM')

@section('container')
	<h1 class="text-4xl md:text-7xl font-bold animate-title-anim">Certifications</h1>
	<p class="mt-4 mb-8">
		Les parcours de certifications complémentaires <i>(PCC)</i> permettent de valider l'acquisition
		des compétences supplémentaires.
	</p>
	<div class="tz-list">
		@forelse($certifications as $certification)
			<a href="{{ $certification->certificate->url }}" class="tz-list-item">
				<div>
					<h2 class="text-2xl font-bold">{{ $certification->primary }}</h2>
					<p>{{ $certification->secondary }}</p>
				</div>
			</a>
		@empty
			<h2 class="text-center italic text-2xl my-8 grid-cols-2">
				Pas de certificats disponibles pour le moment...
			</h2>
		@endforelse
	</div>
@endsection
