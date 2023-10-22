@extends('layouts.base')

@section('title', 'Page de connexion')

@section('body')
    <div class="grid grid-cols-3 w-screen h-screen bgi">
        <div class="shadow-2xl flex flex-col justify-center items-center p-8 bg-neutral-50">
            <h1 class="text-5xl p-4">Connexion</h1>
            <form action="{{ route('admin.auth.login') }}" method="post">
                @csrf
                <input
                    class="w-full px-4 py-2 border my-2"
                    placeholder="email" type="text"
                    name="email"
                    value="{{ old('email') }}" />
                @error('email')
                    {{ $message }}
                @enderror
                <input
                    class="w-full px-4 py-2 border my-2"
                    placeholder="password" type="text"
                    name="password" />
                @error('password')
                    {{ $message }}
                @enderror
                <x-button class="w-full my-2" type="contained">Se connecter</x-button>
            </form>
        </div>
    </div>
@endsection
