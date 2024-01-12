@php
    use Illuminate\Support\Facades\DB;
@endphp

<x-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de bord
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="alert alert-success text-green-500">
                        {{ session('success') }}
                    </div>
                @endif
                <p>Nom : {{ auth()->user()->name }}</p>
                <p>Email : {{ auth()->user()->email }}</p>
                <p>Avatar : </p><img class="w-[150px]" src="{{ Storage::url('avatars/'.auth()->user()->avatar) }}" alt="Avatar" />
                <div class="rounded p-2 m-2 flex gap-2">
                    <!-- Dans votre vue de mise à jour d'avatar (par exemple, update-avatar.blade.php) -->
                    <form action="{{ route('edit') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <label for="new_avatar">Nouvel avatar :</label>
                        <input type="file" name="new_avatar" accept="image/*" required>

                        <button class="bg-green-200 p-2 rounded-2xl" type="submit">Mettre à jour l'avatar</button>
                    </form>
                </div>

                {{-- Récupérer les scènes favorites de l'utilisateur --}}
                @php
                    $userFavorites = auth()->user()->scenesFavorites;
                @endphp

                <br/> <br/>
                <h1>Nom des scènes favorites : </h1>
                <hr/>
                @if(!$userFavorites)
                    <p>Aucune scène favorite.</p>
                @else
                    @foreach($userFavorites as $favorite)
                        <hr/>
                        <p>Nom du favoris : {{ $favorite->name }}</p>
                    @endforeach
                @endif

                @php
                    $commentairesUser = auth()->user()->commentaires;
                @endphp

                <br/> <br/>
                <h1>Commentaires publiés : </h1>
                <hr/>
                @if(!$commentairesUser)
                    <p>Aucun commentaire publié.</p>
                @else
                    @foreach($commentairesUser as $commentaires)
                        <hr/>
                        <p>Commentaires publiés : {{ $commentaires->body }}</p>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</x-layout>
