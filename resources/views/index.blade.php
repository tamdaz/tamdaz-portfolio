@extends('layouts.base')

@section('title', 'Tamda Zohir - Portfolio BTS SIO SLAM')

@section('head')
	@vite('resources/js/app.js')
@endsection

@section('body')
	@include('partials.header')

	@include('sections.hero')
	@include('sections.presentation')
	@include('sections.bts-sio')
	@include('sections.skills')
	@include('sections.experiences')

	@include("partials.footer")
@endsection
