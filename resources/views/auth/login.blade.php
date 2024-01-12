<x-layout>
    <div class="mx-auto mt-16 max-w-xl sm:mt-20 bg-slate-200 p-4 rounded-md border-0">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <input type="hidden" name="redirectTo" value="/home">

            <div>
                <h3>Connexion</h3>
                <p>Accès au tableau de bord</p>
            </div>

            <!-- Email Input -->
            <div class="my-2">
                <input class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="email" placeholder="email@example.com">
            </div>

            <!-- Password Input -->
            <div class="my-2">
                <input class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="password" name="password" placeholder="password">
            </div>


            <!--Login Button-->
            <div>
                <button  type="submit" class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Login</button>
            </div>
            <div>
                Vous n'avez pas de compte ? <a href="{{route('register')}}">Enregistrement</a>
            </div>
        </form>
    </div>
</x-layout>
