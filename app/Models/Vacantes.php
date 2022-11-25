<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catedra;

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
}
