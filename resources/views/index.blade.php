@extends('layouts.base')

@section('title', 'Accueil')

@section('head')
	@vite('resources/js/app.js')
@endsection

@section('body')
	@include('partials.header')

	@include('sections.section1')
	@include('sections.section2')
	@include('sections.section3')
	@include('sections.section4')

	@include("partials.footer")
@endsection
