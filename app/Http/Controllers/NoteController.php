<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Scene;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function storeOrUpdate(Request $request, Scene $scene)
    {
        $user = auth()->user();

        $note = Note::where('user_id', $user->id)
            ->where('scene_id', $scene->id)
            ->first();

        if ($note) {
            Note::where('user_id', $user->id)
                ->where('scene_id', $scene->id)->update(['valeur' => $request->input('valeur')]);
        } else {
            Note::create(['user_id' => $user->id, 'scene_id' => $scene->id, 'valeur' => $request->input('valeur'),]);
        }

        return redirect()->back()->with('success', 'Note ajoutée/modifiée avec succès.');
    }
}
