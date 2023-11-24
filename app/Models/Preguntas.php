<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tipoPreguntas;

class Preguntas extends Model
{
    use HasFactory;

    protected $fillable = [
        'idPregunta',
        'pregunta',
        'respuesta',
        'fkIdTipoPregunta'
    ];

    public function tipoPreguntas(){
        return $this->belongosTo(tipoPreguntas::class, 'fkIdTipoPregunta', 'idTipoPregunta');
    }
}
