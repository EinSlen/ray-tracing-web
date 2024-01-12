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
    <div>
        <nav>
            <div>
            </div>
            <div class="bg-slate-200 rounded p-2 m-2 flex gap-2">
                <a class="bg-green-600 p-2 rounded hover:bg-green-500" href="{{ route('accueil') }}">🏛 Accueil</a>
                @auth
                    <a class="bg-yellow-500 p-2 rounded hover:bg-yellow-400"  href="{{ route('home') }}">🥂 Home</a>
                @endauth
                <a class="bg-yellow-500 p-2 rounded hover:bg-yellow-400"  href="{{ route('apropos') }}">❔ A propos</a>
                <a class="bg-yellow-500 p-2 rounded hover:bg-yellow-400"  href="{{ route('contact.form') }}">☎️ Contactez-nous</a>


                <div class="ml-auto my-auto">
                    @auth
                        <div>
                            <a class="bg-green-500 p-2 rounded hover:bg-green-400"  href="{{ route('profil') }}">Profil</a>
                            <button class="bg-red-600 p-2 rounded hover:bg-red-500"><a href="#" id="logout">Se déconnecter</a>
                            </button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <script>
                            document.getElementById('logout').addEventListener("click", (event) => {
                                document.getElementById('logout-form').submit();
                            });
                        </script>
                    @endauth

                @guest
                <a class="bg-green-600 p-2 rounded hover:bg-green-500" href="{{ route('login') }}">Connexion</a>
                    <a class="bg-yellow-500 p-2 rounded hover:bg-yellow-400"  href="{{ route('register') }}">Enregistrement</a>
                @endguest
            </div>
            </div>
        </nav>
    </div>
</div>

</body>
</html>
