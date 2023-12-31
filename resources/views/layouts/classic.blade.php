@extends('layouts.base')

@section('head')
	@vite('resources/js/header.js')
@endsection

@section('body')
    @include('partials.header')
    <div class="grow">
		<div class="m-auto w-full px-4 md:w-[700px] lg:w-[1000px] relative">
			<img class="absolute -z-20 scale-0 md:-top-[128px] animate-light user-select-none" src="/img/bg_blur.png" alt="bg_blur" />
			<div>
				<div class="py-14 w-full"></div>
				@yield('container')
			</div>
		</div>
    </div>
	<br />
    @include('partials.footer')
@endsection
