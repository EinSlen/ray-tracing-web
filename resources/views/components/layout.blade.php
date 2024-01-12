<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Bienvenue') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500">

<menu>
    <x-header></x-header>
</menu>


    <div>
        {{ $slot }}
    </div>

<footer>
    <x-footer></x-footer>
</footer>


</body>
</html>
