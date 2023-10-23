@extends('layouts.base')

@php
	use Illuminate\Support\Facades\Route;
	$currentRoute = Route::currentRouteName();

	$menus = [
		[
			'name' => 'Accueil',
			'route' => 'admin.index'
		], [
			'name' => 'Profil',
			'route' => 'admin.profile.edit'
		], [
			'name' => 'Compétences',
			'route' => 'admin.skills.index'
		], [
			'name' => 'Expériences',
			'route' => 'admin.experiences.index'
		], [
			'name' => 'Blogs',
			'route' => 'admin.blogs.index'
		], [
			'name' => 'Catégories',
			'route' => 'admin.categories.index'
		]
	];
@endphp

@section('body')
	<div class="grid grid-cols-5 w-screen h-screen">
		<aside class="border-r dark:border-r-neutral-800">
			<header class="w-full border-b dark:border-neutral-800 px-8 py-4 text-center">Administration</header>
			<div class="flex flex-col divide-y dark:divide-neutral-800">
				@foreach($menus as $menu)
					@php
						$canBeActive = $currentRoute !== $menu['route'] ? 'hover:bg-neutral-100 dark:hover:bg-neutral-800 active:bg-neutral-200' : 'font-bold cursor-default bg-neutral-100 dark:bg-neutral-800'
					@endphp
					<a href="{{ route($menu['route']) }}" class="py-5 px-8 {{ $canBeActive }} text-start">
						{{ $menu['name'] }}
					</a>
				@endforeach
			</div>
		</aside>
		<div class="col-span-4 relative">
			<header class="absolute w-full flex border-b dark:border-neutral-800 px-8 py-4">
				<a href="{{ route('pages.home') }}" data-turbolinks="false" class="font-bold">tamdaz</a>
				<div class="flex flex-1"></div>
			</header>
			<section class="px-8 overflow-y-scroll h-full">
				<div class="invisible w-full px-8 py-10"></div>
				@yield('content')
			</section>
		</div>
	</div>
@endsection
