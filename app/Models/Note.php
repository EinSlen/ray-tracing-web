<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    use HasFactory;
    protected $fillable = ['user_id', 'scene_id', 'valeur'];

    public function scene()
    {
        return $this->belongsTo(Scene::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
