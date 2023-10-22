@extends('layouts.admin')

@section('title', "Administration")

@section('content')
    <x-alert
        type="debug"
        primary="Environnement de développement"
        secondary="Projets: {{ $counts['projects'] }} Blogs: {{ $counts['blogs'] }}" />
@endsection