@extends('layouts.classic')

@section('title', 'Contact')

@section('container')
    <h1 class="text-4xl md:text-7xl mt-4 mb-8">Contact</h1>
    <div class="w-full flex flex-col md:grid md:grid-cols-2 gap-4 mt-6">
        <iframe
            width="100%" height="100%"
            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Place%20du%20Carousel,%20Paris+(Place%20du%20Carousel,%20Paris)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
        </iframe>
        <div class="p-4 border dark:border-neutral-800 bg-white dark:bg-black rounded-lg">
            <form action="{{ route('pages.contact_send') }}" method="post">
                @if (session('success'))
                    <x-alert
                        type="success"
                        primary="Message envoyé avec succès"
                        secondary="Vous recevrez la réponse dans les plus brefs délais" />
                @endif
                @csrf
                <div class="flex flex-col">
                    <label class="mb-2" for="name">Votre nom</label>
                    <input class="px-4 py-2" name="name" type="text" value="{{ old('name') }}" />
                </div>
                <span class="inline-block py-2 text-red-500">@error('name') {{ $message }} @enderror</span>
                <div class="flex flex-col">
                    <label class="mb-2" for="email">Votre adresse mail</label>
                    <input class="px-4 py-2" name="email" type="text" value="{{ old('email') }}" />
                </div>
                <span class="inline-block py-2 text-red-500">@error('email') {{ $message }} @enderror</span>
                <div class="flex flex-col">
                    <label class="mb-2" for="message">Votre message</label>
                    <textarea class="px-4 py-2 h-40" name="message">{{ old('message') }}</textarea>
                </div>
                <span class="inline-block py-2 text-red-500">@error('message') {{ $message }} @enderror</span>
                <div class="grid grid-cols-1 mt-4">
                    <x-button type="contained" type_form="submit" class="w-full">Envoyer</x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
