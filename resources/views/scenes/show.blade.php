<x-layout>
    @if($scene)
        <div class="grid grid-cols-2">
            <div class="bg-slate-200 m-4 rounded p-4 flex flex-col">
                <strong>nom : {{$scene->name}}</strong>
                <strong>Equipe : {{$scene->team}}</strong>
                <strong>{{$scene->scene}}</strong>
                <img class=" w-96 w-min-96 p-2" src="{{Storage::url($scene->image_path)}}" alt="Pas d'image">
                <img class=" w-96 w-min-96  p-2" src="{{Storage::url($scene->thumbnail_path)}}" alt="Pas d'image">
                <strong>Exécutable : {{$scene->executable_link}}</strong>
                <strong>Créateur : {{$scene->user->name}}</strong>
            </div>
            <div class="bg-slate-200 m-4 rounded p-4">
                <h3 class="font-bold">Markdown</h3>
                <div>{!!$parsedown->text($scene->description)!!}</div>
            </div>
        </div>
        <div class="bg-white p-5 w-1/2 bg-slate-200 m-4 rounded p-4">
            @auth
                @foreach(\App\Models\Note::where('user_id', auth()->id())->where('scene_id', $scene->id)->get() as $note)
                    <h2 class="text-black ml-2">Votre Note :</h2>
                    <p class="text-black ml-2 bg-amber-500 w-[120px] p-2">Scène ID : {{ $note->scene_id }}, Note : {{ $note->valeur }}</p>
                @endforeach

                <form action="{{ route('notes.storeOrUpdate', ['scene' => $scene]) }}" method="post">
                    @csrf
                    <input class="bg-amber-200" type="number" name="valeur" min="0" max="5" step="0.1" value="0">
                    <button class="bg-amber-200 p-2" type="submit">Ajouter/Modifier la note</button>
                </form>
            @endauth
            @guest
                <h1 class="text-black">Connectez vous pour attribuer une note.</h1>
            @endguest
        </div>

        <h2 class="text-white text-center ">Commentaire(s)</h2>
        @auth
            <a href="{{ Route('commentaires.create', $scene->id) }}" class="bg-green-600 rounded hover:green-400 m-4 p-2">Ajouter un commentaire</a>
        @endauth
        @if(! empty($commentaires))
            @foreach($commentaires as $commentaire)
                <div class="bg-slate-200 m-4 rounded p-4 flex flex-row">
                    <div class="basis-1/4 flex flex-col items-center">
                        <img src="{{Storage::url($commentaire->user->avatar)}}" alt="no" class="w-10 h-10">
                        <h2>{{$commentaire->user->name}}</h2>
                        <p>{{$commentaire->created_at}}</p>
                    </div>
                    <div class="basis-2/4">
                        <h3 class="font-bold ">{{$commentaire->title}}</h3>
                        <p>{{$commentaire->body}}</p>
                    </div>
                    @auth
                        @if(auth()->id() == $commentaire->user->id || auth()->user()->admin)
                            <div class="basis-1/4 flex flex-col items-center ">
                                @if($deleteCom==$commentaire->id)
                                    {{View('commentaires.validate-view', ['id'=>$commentaire->id, 'scene_id'=>$scene->id])}}
                                @else
                                    <form action="{{Route('scenes.show', $scene->id)}}" method="get">
                                        @csrf
                                        <input type="hidden" name="idCom" value="{{$commentaire->id}}">
                                        <input class="text-black p-2 bg-red-600" type="submit" name="delete" value="Supprimer">
                                    </form>
                                @endif
                                <a href="{{ Route('commentaires.edit', [$commentaire->id, $scene->id]) }}" class="bg-blue-600 hover:blue-400 rounded  m-4 p-2">Modifier commentaire</a>
                            </div>
                        @endif
                    @endauth
                </div>
            @endforeach
        @else
            <p>Pas de commentaire ici</p>
        @endif
    @else
        <p>Pas de scene</p>
    @endif
</x-layout>
