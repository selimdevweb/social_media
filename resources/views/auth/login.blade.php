@extends('layouts.app')
@section('content')
 <div class="flex justify-center mt-5">
    <div class="w-6/12 bg-white p-6 rounded-lg">

        @if (session('status'))
            <div class="bg-red-500 p-4 rounded-lg mb-6 text-white texte-center">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf {{-- pour se protéger contre le cross-site request forgery, abrégé CSRF --}}
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="name" placeholder="Email"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('name')
                border-red-500
                @enderror" value="{{ old('email') }}">
            </div>

            @error('email')
                <div class="flex justify-center text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Your password"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('name')
                border-red-500
                @enderror" value="">
            </div>

            @error('password')
                <div class="flex justify-center text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember">Remember me</label>
            </div>

            <div>
                <link rel="stylesheet" href="{{ asset('css/app.css') }}">
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 p-4 rounded font-medium w-full">Login</button>
            </div>
        </form>
    </div>
 </div>
@endsection
