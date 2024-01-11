@extends('layouts.classic')

@section('title', 'Tamda Zohir - Portfolio BTS SIO SLAM - Certificats')

@section('container')
	<h1 class="text-4xl md:text-7xl animate-title-anim">Certifications</h1>
	<p class="mt-4 mb-8">
		Voici l'ensemble de certifications que j'ai obtenu.
	</p>
	<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
		@forelse($certifications as $certification)
			<x-card
				type="media"
				:src="optional($certification->certificate)->url"
				:title="$certification->primary"
				:description="$certification->secondary"
				:url="optional($certification->certificate)->url"
			/>
		@empty
			<span class="text-center col-span-2">Pas de certificats disponibles pour le moment.</span>
		@endforelse
	</div>
@endsection