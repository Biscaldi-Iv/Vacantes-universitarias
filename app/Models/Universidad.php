<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catedra;

class Universidad extends Model
{
    use HasFactory;
    protected $fillable = [
        'idUniversidad',
        'nombreUniversidad',
        'direccionUniversidad',
        'telefono',
        'emailRRHH',
        'sitioWeb'
    ];

    public function catedras()
    {
        return $this->hasMany(Catedra::class, 'fkIdUniversidad', 'idUniversidad');
    }
}
