@extends('layouts.classic')

@section('title', "Mes expériences professionnelles")

@section('container')
    <h1 class="text-4xl md:text-7xl mt-4 mb-8">Expériences professionnelles</h1>
    <x-timeline :periods="$periods" />
@endsection
