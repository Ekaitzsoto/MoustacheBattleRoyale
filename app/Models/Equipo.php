<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'presidente',
    ];

    public function guerra()
    {
        return $this->belongsTo('App\Models\Guerra');
    }

    public function jugadores()
    {
        return $this->hasMany('App\Models\Jugador');
    }
}
