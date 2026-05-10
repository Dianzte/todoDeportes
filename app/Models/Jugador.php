<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Jugador extends Model
{
    protected $fillable = ['nombre', 'numero', 'equipo_id'];


    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
