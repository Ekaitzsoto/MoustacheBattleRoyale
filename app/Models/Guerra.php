<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guerra extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'jugadores_equipo',
        'ganador',
        'estado'
    ];

    public function equipos()
    {
        return $this->hasMany('App\Models\Equipo');
    }
    public function jugadores()
    {
        return $this->hasMany('App\Models\Jugador');
    }
}
