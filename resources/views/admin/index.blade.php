@extends('layouts.admin')

@section('title', "Administration")

@section('content')
    @if(App::isDownForMaintenance())
        <x-alert
            type="warn"
            primary="Site en maintenance"
            secondary="Pour l'instant, personne ne peut accéder à ce site. La page d'administration reste en revanche accessible pour ceux qui ont le droit d'y accéder." />
    @endif
    @if(App::hasDebugModeEnabled() === true)
        <x-alert
            type="debug"
            primary="Environnement de développement"
            secondary="{{ $count_blogs }} blogs" />
    @endif
@endsection