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
        'ant_penales',
        'relaciones_uni',
        'investigaciones',
    ];

    public function usuario()
    {
        return $this->hasOne(Usuario::class,'fkIdUsuario','id');
    }

}
