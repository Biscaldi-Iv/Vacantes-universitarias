<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Postulacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'idPostulacion',
        'fkIdUsuario',
        'fkIdVacante',
        'fechaPostulacion',
        'titulo',
        'experiencia',
        'con_asignatura',
        'publicaciones',
        'congresos',
        'actitud',
        'disponibilidad',
        'entrevista',
        'sueldo',
        'investigaciones'
    ];

    protected $attributes=[
        'titulo'=>0,
        'experiencia'=>0,
        'con_asignatura'=>0,
        'publicaciones'=>0,
        'congresos'=>0,
        'actitud'=>0,
        'disponibilidad'=>0,
        'entrevista'=>0,
        'sueldo'=>0,
        'investigaciones'=>0
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'fkIdUsuario','id');
    }

}
