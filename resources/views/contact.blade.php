<x-layout>

<div class="mx-auto mt-16 max-w-xl sm:mt-20 bg-slate-200 p-4 rounded-md border-0">
    @if(session('success'))
        <div class="alert alert-success text-center">
            <h1 class="text-green-500">Votre message à bien été envoyé avec succès !</h1>
            <br/>
            @foreach(session('success') as $message)
                <p>{{ $message }}</p>
                <br/>
            @endforeach
            <br/>
            <a class="bg-yellow-500 p-2 rounded hover:bg-yellow-400"  href="{{ route('contact.form') }}">☎️ Renvoyer un message</a>
        </div>

    @else
        <fieldset>
            <form action="" method="post">
                @csrf
                <div>
                    <label for="nom">Votre nom</label>
                    <input class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" id="nom" name="nom" placeholder="Nom" required>
                </div>
                <div>
                    <label for="nom">Votre Prénom</label>
                    <input class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" id="nom" name="prenom" placeholder="Prenom" required>
                </div>
                <div class="my-2">
                    <label for="email">Votre e-mail</label>
                    <input class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="email" id="email" name="email" placeholder="monadresse@mail.com" required>
                </div>

                <div class="my-2">
                    <label for="message">Votre message</label>
                    <textarea class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="message" name="message" placeholder="Bonjour, je vous contacte car...." required></textarea>
                </div>
                <div>
                    <button class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600" type="submit">Envoyer mon message</button>
                </div>
            </form>
        </fieldset>
    @endif
</div>

</x-layout>
