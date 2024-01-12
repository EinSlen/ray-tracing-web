<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Commentaire;
use App\Providers\AuthServiceProvider;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($scene_id)
    {
        return view('commentaires.create', ["scene_id"=>$scene_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $scene_id)
    {
        if($request->create == "Valider" && Auth::check()){
            $this->validate($request,[
                'title'=>'required',
                'body'=>'required',
            ]);

            $auth = Auth::id();
            //dd($auth);
            $commentaire = new Commentaire();
            $commentaire->user_id = $auth;
            $commentaire->scene_id = $scene_id;
            $commentaire->title = $request->title;
            $commentaire->body = $request->body;
            $commentaire->save();
        }

        return redirect()->route('scenes.show', $scene_id);
    }

    /**
     * Display the specified resource.
     */
    public function show($commentaire, $scene_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($commentaire_id, $scene_id)
    {
        $commentaire = Commentaire::find($commentaire_id);
        return view('commentaires.edit',['commentaire'=>$commentaire,'scene_id'=>$scene_id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,$scene_id)
    {
        if($request->create == "Valider" && Auth::check()){
            $this->validate($request,[
                'title'=>'required',
                'body'=>'required',
            ]);

            $auth = Auth::id();
            $commentaire = Commentaire::find($id);
            $commentaire->user_id = $auth;
            $commentaire->scene_id = $scene_id;
            $commentaire->title = $request->title;
            $commentaire->body = $request->body;
            $commentaire->save();
        }

        return redirect()->route('scenes.show', $scene_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id ,$scene_id)
    {

        if($request->delete == "Supprimer" && Auth::check()){
            $commentaire = Commentaire::find($id);
            $commentaire->delete();
        }
        return redirect()->route('scenes.show', $scene_id);
    }
}
