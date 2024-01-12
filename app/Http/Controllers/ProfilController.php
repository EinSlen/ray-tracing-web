<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function show() {
        return view('profil.index');
    }

        public function updateAvatar(Request $request) {
            $user = auth()->user();
            $avatarPath = $request->file('new_avatar')->store('avatars', 'public');
            $user->update(['avatar' => basename($avatarPath)]);

            return redirect()->back()->with('success', 'Avatar mis à jour avec succès.');

        }
}
