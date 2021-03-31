@extends('layouts.app')
@section('content')
 <div class="flex justify-center mt-5">
    <div class="w-6/12 bg-white p-6 rounded-lg">

        <form action="{{ route('register') }}" method="POST">
            @csrf {{-- pour se protéger contre le cross-site request forgery, abrégé CSRF --}}
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Your Name"                 class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('name')
                border-red-500
                @enderror"
                 value="{{ old('name') }}">
            </div>

            @error('name')
                <div class="flex justify-center text-red-500 mt-2 text-sm">
                   <p>Merci de compléter tous les camps </p>
                </div>
            @enderror

            <div class="mb-4">
                <label for="username" class="sr-only">User Name</label>
                <input type="text" name="username" id="username" placeholder="Username"
                class="bg-gray-100 border-2 w-full p-4  rounded-lg
                @error('name')
                border-red-500
                @enderror" value="{{ old('username') }}">
            </div>

            @error('username')
                <div class="flex justify-center text-red-500 mt-2 text-sm">
                  {{ $message }}
                </div>
            @enderror

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

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Password again</label>
                <input type="password" name="password_confirmation" id="password" placeholder="repeat yourpassword"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('name')
                border-red-500
                @enderror" value="">
            </div>

            @error('password_confirmation')
                <div class="flex justify-center text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror

            <div >
                <link rel="stylesheet" href="{{ asset('css/app.css') }}">
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 p-4 rounded font-medium w-full">Register</button>
            </div>
        </form>
    </div>
 </div>
@endsection
