<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
    <header>
        <nav class="p-6 bg-white flex justify-between">
            <div class="flex align-items-center">
                <a href="{{ Route('home') }}" class="p-3">Home</a>
                <a href="{{ route('dashboard') }}" class="p-3">DashBoard</a>
                <a href="{{ route('posts') }}" class="p-3">Posts</a>
            </div>
            <div class="flex items-center">

            {{-- condition d'affichage en fonction de la connexion ou non --}}
            {{-- @if (auth()->user())
                @else
                @endif
                --}}
                @auth
                <a href="" class="p-3">{{ auth()->user()->name }}</a>

                <form action="{{ route('logout') }}" method="post"class="inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
                @endauth

                @guest
                <a href="{{ Route('login') }}" class="p-3">Login</a>
                <a href="{{ Route('register') }}" class="p-3">register</a>
                @endguest
            </div>
        </nav>
    </header>
    @yield('content')
    <div id="example">

    </div>
</body>
<script src="/js/app.js"></script>
</html>
