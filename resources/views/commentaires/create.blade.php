<x-validate-layout>
@auth
<div class="bg-gray mx-auto mt-16 max-w-xl sm:mt-20 bg-slate-200 p-4 rounded-md border-0">
    <form action="{{Route('commentaires.store',$scene_id)}}" method="post">
        @csrf
        <div>
            <label for="title">titre</label>
            <input class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" id="title" name="title" placeholder="title">
        </div>
        <div class="my-2">
            <label for="body">Votre commentaire</label>
            <textarea class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="body" name="body" placeholder="body"></textarea>
        </div>
        <div class="grid grid-cols-2">
            <button class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 mr-0.5" type="submit" name="create" value="Valider">Valider</button>
            <button class="block w-full rounded-md bg-red-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 ml-0.5" type="submit" name="create" value="annuler">annuler</button>
        </div>
    </form>
</div>
@endauth
@guest
    <p class="text-sky-50 text-center font-bold">Page inaccessible</p>
@endauth
</x-validate-layout>
