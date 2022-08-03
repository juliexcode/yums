@extends('layouts.guest')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <x-label for="email" class="form-label" :value="__('E-mail')" />

            <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" class="form-label" :value="__('Mot de passe')" />

            <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mb-3">
            @if (Route::has('password.request'))
            <a style="color:black;" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-button class="ml-3" style="background-color:#E6C065 ;">
                {{ __('Se connecter') }}
            </x-button>
        </div>
    </form>
</div>
<div style="height:230px"></div>
@endsection