@extends('layouts.classic-full')

@section('title', 'Veille technologique - Tamda Zohir - Portfolio BTS SIO SLAM')

@section('container')
	@vite('resources/js/glitch.js')

	<div class="relative">
		<div class="w-screen h-[700px] flex justify-center items-center absolute" id="rasberry">
			<img class="opacity-35 width-[100px] block" src="/img/rasberry-pi.svg" id="rasberry_img" alt="rasberry" width="400px" />
		</div>
		<div class="w-screen h-[700px] flex flex-col justify-center items-center relative" id="presentation" style="animation-delay: 1s; opacity: 0">
			<h1 class="text-3xl md:text-6xl font-bold text-pink-500 inline [text-shadow:_0_4px_10px_rgb(0_0_0_/_20%)]">Veille technologique</h1>
			<p class="my-4 px-8 max-w-[700px] text-center">
				Le but de la veille technologique est de suivre l'évolution de la thématique choisie.
				<br />
				Dans mon cas, ma thématique est sur le Raspberry car il est actuellement utilisé pour faire des IOT,
				pour un poste informatique et pour l'analyse de données.
			</p>
		</div>
	</div>
	<div class="max-w-[1050px] m-auto mb-12 p-8">
		<h1 class="text-5xl font-bold mb-8">Méthode de veille ?</h1>
		<div class="grid grid-cols-4 gap-8">
			<img src="/img/feedly.svg" alt="feedly" />
			<p class="col-span-3 flex items-center">
				Pour recueillir de nouvelles informations, la méthode de veille automatique est utilisée.
				Pour cela, j'utilise Feedly qui est un site web permettant de récupérer
				automatiquement les nouveaux articles sur l'évolution du Raspberry.
				<br/>
				Les sites publiant les articles sur le Raspberry et possédant le flux RSS sont choisis.
			</p>
		</div>
	</div>
	<div class="max-w-[1050px] m-auto mb-12 p-8">
		<h1 class="text-5xl font-bold mb-8">Derniers articles</h1>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
			@forelse ($news as $new)
				<x-card
					type="media"
					:title="$new->title"
					:description="$new->description"
					:src="$new->image_url"
					:url="$new->source_url" />
			@empty
				<span class="text-center col-span-2">Pas de résultats</span>
			@endforelse
		</div>
	</div>
@endsection
