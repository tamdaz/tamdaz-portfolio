@extends('layouts.classic')

@section('title', 'Comptes-rendus - Tamda Zohir - Portfolio BTS SIO SLAM')

@section('head')
	@livewireStyles
@endsection

@section('container')
	<h1 class="text-4xl md:text-7xl mb-8 font-bold animate-title-anim">Comptes-rendus</h1>
	<p class="mb-6">
		Les comptes-rendus sont publiés, mis à jour et accessibles pour tout lecteur.
		Elles sont triées par date de création du plus récent au plus ancien.
		Également, elles sont catégorisées par les 3 blocs en lien avec le BTS SIO :
		Bloc 1 <i>(Mise à disposition des services informatiques)</i>,
		Bloc 2 <i>(SLAM)</i> et
		Bloc 3 <i>(Cybersécurité)</i>.
	</p>

	<x-alert
		type="info"
		secondary="Si vous constatez qu'il y a des erreurs ou des incohérences dans mes comptes-rendus,
		n'hésitez pas à me prévenir en envoyant un message dans la page de contact." />

	@livewire('report-search')

	@livewireScripts
@endsection
