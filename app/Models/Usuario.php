<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Usuario extends User
{
    use HasFactory;

    protected $fillable = [
        'fkiduser',
        'titulos',
        'experiencia',
        'con_asignatura',
        'disponibilidad',
        'congresos',
        'educacion',
        'publicaciones',
        'investigaciones',
        'con_profesionales'
    ];
}
