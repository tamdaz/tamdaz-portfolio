@extends('layouts.classic')

@section('title', 'Contact - Tamda Zohir')

@section('container')
    <h1 class="text-4xl md:text-7xl mb-8 animate-title-anim">Contact</h1>
    <x-alert
        type="info"
        primary="Page de contact"
        secondary="Si la page de contact ne fonctionne pas, vous pouvez envoyer votre message via mon adresse email : tamda.zohir.pro@gmail.com" />
    @if (session('success'))
        <x-alert
            type="success"
            primary="Message envoyé avec succès"
            secondary="Vous recevrez la réponse dans les plus brefs délais" />
    @endif
    <div class="w-full flex flex-col gap-4 mt-6">
        <div class="p-4 border dark:border-neutral-800 bg-white dark:bg-black rounded-lg">
            <form action="{{ route('pages.contact_send') }}" method="post">
                @csrf
                <div class="flex flex-col">
                    <label class="mb-2" for="name">Votre nom</label>
                    <input class="px-4 py-2" name="name" type="text" value="{{ old('name') }}" />
                </div>
                <span class="inline-block py-2 text-red-500">@error('name') {{ $message }} @enderror</span>
                <div class="flex flex-col">
                    <label class="mb-2" for="email">Votre adresse email</label>
                    <input class="px-4 py-2" name="email" type="text" value="{{ old('email') }}" />
                </div>
                <span class="inline-block py-2 text-red-500">@error('email') {{ $message }} @enderror</span>
                <div class="flex flex-col">
                    <label class="mb-2" for="message">Votre message</label>
                    <textarea class="px-4 py-2 h-40" name="message">{{ old('message') }}</textarea>
                </div>
                <span class="inline-block py-2 text-red-500">@error('message') {{ $message }} @enderror</span>
                <div class="grid grid-cols-1">
                    <x-button type="contained" type_form="submit" class="w-full">Envoyer</x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
