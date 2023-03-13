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

    public function vacante()
    {
        return $this->belongsTo(Vacantes::class,'fkIdVacante','id');
    }



    public function puntuacion_total(){
        $t= $this->titulo+ $this->experiencia + $this->con_asignatura + $this->publicaciones + $this->congresos +
        $this->actitud + $this->disponibilidad + $this->entrevista + $this->sueldo + $this->investigaciones;
        return $t;
    }

}
