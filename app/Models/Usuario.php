<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
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

    public function user()
    {
        return $this->hasOne(User::class, 'id','fkiduser');
    }
}
