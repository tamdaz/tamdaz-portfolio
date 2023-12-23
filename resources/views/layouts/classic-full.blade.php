@extends('layouts.base')

@section('head')
	@vite('resources/js/header.js')
@endsection

@section('body')
    @include('partials.header')
	<div>
		@yield('container')
	</div>
    @include('partials.footer')
@endsection
