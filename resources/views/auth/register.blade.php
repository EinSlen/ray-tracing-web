<x-layout>
    @if($errors->any())
        <div class="my-2 text-red-500">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mx-auto mt-16 max-w-xl sm:mt-20 bg-slate-200 p-4 rounded-md border-0">
        <form  action="{{route('register')}}" method="post" >
            @csrf
            <div >
                <h3>Enregistrement</h3>
                <p>Enregistrement pour l'accès à l'application</p>
            </div>
            <!--Nom Input-->
            <div class="my-2">
                <input class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="name"  placeholder="Nom">
            </div>
            <!--Email Input-->
            <div class="my-2">
                <input class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="email"  placeholder="email@exemple.com">
            </div>
            <!--Password Input-->
            <div class="my-2">
                <input class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="password" name="password"  placeholder="mot de passe">
            </div>
            <!--Confirm Password Input-->
            <div class="my-2">
                <input class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="password" name="password_confirmation" placeholder="Confirmez mot de passe">
            </div>
            <!--Login Button-->
            <div class="my-2">
                <button  type="submit" class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Enregistrement</button>
            </div>
            <div >
                Vous avez déjà un compte ? <a href="{{route('login')}}">Connexion</a>
            </div>
        </form>
    </div><!--/.wrap-->
</x-layout>
