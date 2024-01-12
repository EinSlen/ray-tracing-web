<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoris extends Model
{
    use HasFactory;

    public function favorites()
    {
        return $this->hasMany(Favoris::class);
    }

    protected $fillable = ['user_id', 'scene_id'];


}
