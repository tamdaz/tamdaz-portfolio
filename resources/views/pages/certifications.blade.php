@extends('layouts.classic')

@section('title', 'Certifications - Tamda Zohir - Portfolio BTS SIO SLAM')

@section('container')
	<h1 class="text-4xl md:text-7xl font-bold animate-title-anim">Certifications</h1>
	<p class="mt-4 mb-8">
		Les parcours de certifications complémentaires <i>(PCC)</i> permettent de valider l'acquisition
		des compétences supplémentaires.
	</p>
	<div class="gap-4">
		@forelse($certifications as $certification)
			<embed
				src="{{ optional($certification->certificate)->url }}#toolbar=0&navpanes=0&scrollbar=0"
				width="100%"
				height="700px" />
		@empty
			<span class="text-center col-span-2">Pas de certificats disponibles pour le moment.</span>
		@endforelse
	</div>
@endsection