@extends('layouts.classic-full')

@section('title', 'Contact - Tamda Zohir - Portfolio BTS SIO SLAM')

@section('container')
    <div class="w-screen h-full lg:h-screen lg:grid md:grid-cols-2 xl:flex xl:flex-row">
        <div class="flex flex-col justify-center mt-16 lg:mt-0 lg:order-last px-8 py-8 w-full">
            @if (session()->has('success'))
                <x-alert
                    type="success"
                    primary="Message envoyé avec succès"
                    :secondary="session('success')" />
            @endif
            @if (session()->has('error'))
                <x-alert
                    type="error"
                    primary="Une erreur est survenue lors de l'envoi du message..."
                    :secondary="session('error')" />
            @endif
        </div>
        <div class="flex flex-col justify-center lg:bg-neutral-100 dark:lg:bg-black w-full px-8 pb-8">
            <h1 class="text-4xl md:text-7xl mb-8 font-bold animate-title-anim">Contact</h1>
            <form action="{{ route('pages.contact_send') }}" method="post">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <div class="flex flex-col">
                            <label class="mb-2" for="name">Votre nom et prénom :</label>
                            <input class="px-4 py-2" id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" />
                        </div>
                        <span class="inline-block py-2 text-red-500">@error('name') {{ $message }} @enderror</span>
                    </div>
                    <div>
                        <div class="flex flex-col">
                            <label class="mb-2" for="email">Votre adresse email : </label>
                            <input class="px-4 py-2" id="email" name="email" type="text" value="{{ old('email') }}" autocomplete="email" />
                        </div>
                        <span class="inline-block py-2 text-red-500">@error('email') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="flex flex-col">
                    <label class="mb-2" for="message">Votre message (5000 caractères maximum) : </label>
                    <textarea class="px-4 py-2 h-32 min-h-20 max-h-48" id="message" name="message">{{ old('message') }}</textarea>
                </div>
                <span class="inline-block py-2 text-red-500">@error('message') {{ $message }} @enderror</span>
                <p class="mb-6 opacity-75 text-sm">
                    En cliquant sur "Envoyer", vous acceptez que ces données soient stockées
                    temporairement dans une file d'attente pour optimiser le processus d'envoi de messages.
                    Une fois ce processus terminé, ces données vont être supprimées de cette file d'attente.
                </p>
                <div class="grid grid-cols-1">
                    <x-button type="contained" type_form="submit" class="w-full">Envoyer</x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
