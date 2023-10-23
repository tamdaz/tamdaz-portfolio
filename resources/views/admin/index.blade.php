@extends('layouts.admin')

@section('title', "Administration")

@section('content')
    <x-alert
        type="debug"
        primary="Environnement de développement"
        secondary="{{ $count_blogs }} blogs" />
@endsection