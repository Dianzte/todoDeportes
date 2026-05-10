<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    public function jugadores()
    {
        return $this->hasMany(Jugador::class);
    }

    protected $fillable = ['nombre', 'user_id', 'deporte'];
}
