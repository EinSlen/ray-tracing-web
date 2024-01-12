<x-layout :titre="$titre">
    @if(!empty($scenes))
        <h2 class="text-white text-center ">{{$titre}}</h2>
        <div class="bg-slate-200 m-4 rounded p-4">
            <h4>Filtrage</h4>
            <form action="{{ route('scenes.index') }}" method="get" class="p-1 block text-sm font-medium leading-6 text-gray-900">
                <select name="cat" class="w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="All" @if($cat == 'All') selected @endif>-- Equipe : Toutes les scènes --</option>
                    @foreach($teams as $team)
                        <option value="{{$team}}" @if($cat == $team) selected @endif>{{$team}}</option>
                    @endforeach
                    <option value="rec" @if($cat == 'rec') selected @endif>-- Les 5 plus récentes --</option>
                    <option value="notes" @if($cat == 'notes') selected @endif>-- Les 5 mieux notées --</option>
                </select>
                <input type="submit" value="OK" class="bg-green-600 rounded p-1 hover:bg-green-500">
            </form>
        </div>
        <div class="flex flex-wrap justify-center mx-4 bg-slate-200 p-4 rounded">

        @foreach($scenes as $scene)
            <a class="bg-slate-300 rounded p-2 m-2 hover:bg-slate-50 w-64 h-80 shadow" href="{{Route('scenes.show',$scene->id)}}">
                <img src="{{Storage::url($scene->thumbnail_path)}}" alt="pas d'images" class="inline">
                <h3>{{$scene->name}}</h3>
                <h4>{{$scene->team}}</h4>
                <p>{{$scene->created_at}}</p>
                @auth
                <form action="{{ route('scenes.favoris', $scene->id) }}" method="post">
                    @csrf
                    <button type="submit" class="text-gray-500 hover:text-yellow-500 focus:outline-none">
                        @if(\App\Models\Favoris::where('scene_id', $scene->id)->where('user_id', auth()->user()->id)->exists())
                            ⭐
                        @else
                            ❌
                        @endif
                    </button>
                </form>
                    <p>📚</p>
                @endauth
            </a>

                <x-statistiques :moyenne="$statistiques[$scene->id]['moyenne']" :max="$statistiques[$scene->id]['max_notes']" :min="$statistiques[$scene->id]['min_notes']" :nombreFavoris="$statistiques[$scene->id]['favoris']"></x-statistiques>
        @endforeach
        </div>
    @else
        <h3>Aucune scène dans la table ...</h3>
    @endif
</x-layout>
