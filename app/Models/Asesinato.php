<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesinato extends Model
{
    use HasFactory;

    protected $fillable = [
        'guerra_id',
        'asesino',
        'muerto'
    ];
}
