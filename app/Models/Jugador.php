<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'kills',
        'vivo',
        'asesinadopor',
        'equipo_id',
        'guerra_id'
    ];

    public function equipo()
    {
        return $this->belongsTo('App\Models\Equipo');
    }
}
