<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Note;
use App\Models\Favoris;
use App\Models\Scene;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Parsedown;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\NoteController;


class SceneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);

        $teams = Scene::distinct('team')->pluck('team');
        $rec = Scene::distinct('created_at')->pluck('created_at');
        $notes = Note::distinct('valeur')->pluck('valeur');
        if (!isset($cat)) {
            if (!isset($value)) {
                $scenes = Scene::all();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                if($teams->contains($cat)){
                    $scenes = Scene::where('team', $value)->get();
                }elseif ($rec->contains($cat)){
                    $scenes = Scene::orderBy('created_at','desc')->take(5)->get();
                }else{
                    $scenes = Scene::select('scenes.*',DB::raw('IFNULL(AVG(notes.valeur),0) AS moy'))->join('notes','scenes.id','=','notes.scene_id')
                    ->groupBy('scenes.id')->orderBy('moy','desc')->take(5)->get();
                }
                $cat = $value;
                Cookie::queue('cat', $cat, 10);
            }

        } else {
            if ($cat == 'All') {
                $scenes = Scene::all();
                Cookie::expire('cat');
            } else {
                if($teams->contains($cat)){
                    $scenes = Scene::where('team', $cat)->get();
                }elseif ($rec->contains($cat)){
                    $scenes = Scene::orderBy('created_at','desc')->take(5)->get();
                }else{
                    $scenes = Scene::select('scenes.*',DB::raw('IFNULL(AVG(notes.valeur),0) AS moy'))->join('notes','scenes.id','=','notes.scene_id')
                        ->groupBy('scenes.id')->orderBy('moy','desc')->take(5)->get();
                }
                Cookie::queue('cat', $cat, 10);
            }
        }


        $stats = [];
        foreach ($scenes as $scene) {
            $stats[$scene->id] = $scene->statistiques;
        }

        return view('scenes.index',
            ['titre' => "Liste des Scènes", 'scenes' => $scenes, 'cat' => $cat, 'teams' => $teams, 'rec'=>$rec,'statistiques' => $stats,'notes'=>$notes]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $scene = Scene::find($id);
        $parsedown = new Parsedown();
        $commentaires = Commentaire::where('scene_id','=',$scene->id)->orderby('created_at','desc')->get();
        if($request->delete == "Supprimer"){
            return view("scenes.show",['scene'=>$scene, 'parsedown'=>$parsedown,'commentaires'=>$commentaires,'deleteCom'=>$request->idCom]);
        }
        return view("scenes.show",['scene'=>$scene, 'parsedown'=>$parsedown,'commentaires'=>$commentaires,'deleteCom'=>null]);
    }


    public function update(Request $request, Scene $scene)
    {
        // Utilisez NoteController@updateNote pour mettre à jour la note
        $noteController = new NoteController();
        return $noteController->updateNote($request, $scene->id, auth()->id());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function toggleFavori(Scene $scene)
    {
        $user = auth()->user();

        $favori = Favoris::where('user_id', $user->id)
            ->where('scene_id', $scene->id)->first();
        if ($favori) {
            Favoris::where('user_id', $user->id)
                ->where('scene_id', $scene->id)->delete();
        } else {
            Favoris::create(['user_id' => $user->id, 'scene_id' => $scene->id]);
        }

        return redirect()->route('scenes.index');
    }
}
