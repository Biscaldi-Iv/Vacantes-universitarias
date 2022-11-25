<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catedra;
use App\Models\Postulacion;

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

    public function catedra()
    {
        return $this->hasOne(Catedra::class, 'idCatedra','fkIdCatedra');
    }

    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class, 'fkIdVacante', 'idVacante');
    }
}
