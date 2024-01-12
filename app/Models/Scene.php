<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'scene_id', 'id');

    }

    public function favoris()
    {
        return $this->hasMany(Favoris::class, 'scene_id');
    }

    public function getStatistiquesAttribute()
    {
        $avgNote = $this->notes()->avg('valeur') ?? "Pas noté";
        $maxRating = $this->notes()->max('valeur') ?? "Pas noté";
        $minRating = $this->notes()->min('valeur') ?? "Pas noté";
        $favoritedByUsers = $this->favoris()->count();

        return [
            'moyenne' => $avgNote,
            'min_notes' => $minRating,
            'max_notes' => $maxRating,
            'favoris' => $favoritedByUsers,
        ];
    }

    public function favorisUsers()
    {
        return $this->belongsToMany(User::class, 'favoris', 'scene_id', 'user_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'scene_id');
    }

}
