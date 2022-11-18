<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Usuario extends User
{
    use HasFactory;

    protected $fillable = [
        'idPostulacion',
        'fkIdUsuario',
        'fkIdVacante',
        'fechaPostulcin',
        'titu',
        'experiencia',
        'con_asignatura',
        'publicaciones',
        'congresos',
        'actitud',
        'disponibilidad',
        'entrevista',
        'sueldo',
        'ant_penales',
        'relaciones_uni',
        'investigaciones',
    ];
}
