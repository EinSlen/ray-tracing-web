<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500">
<div>
    <div >
        <nav>
            <div>
            </div>
            <div class="bg-slate-200 rounded p-2 m-2 ">
                <a class="bg-green-600 p-1 rounded hover:bg-green-500" href="{{ route('login') }}">Connexion</a>
                <a class="bg-yellow-500 p-1 rounded hover:bg-yellow-400"  href="{{ route('register') }}">Enregistrement</a>
            </div>
        </nav>
    </div>

    <div>
        {{ $slot }}
    </div>
    <footer>
        <x-footer></x-footer>
    </footer>
</div>

</body>
</html>
