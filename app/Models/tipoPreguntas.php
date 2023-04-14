<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preguntas;

class tipoPreguntas extends Model
{
    use HasFactory;
    protected $fillable = [
        'idTipoPregunta',
        'descripcion'
    ];

    public function preguntas(){
        return $this->hasMany(Preguntas::class, 'fkIdTipoPregunta','idTipoPregunta');
    }
}
