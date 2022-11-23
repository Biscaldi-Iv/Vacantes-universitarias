<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacantes extends Model
{
    use HasFactory;
    protected $fillable = [
        'idVacante',
        'fkIdCatedra',
        'tituloVacante',
        'descCorta',
        'descCompleta',
        'titulosRequeridos',
        'horarioJornada',
        'fechaLimite'
    ];
}
