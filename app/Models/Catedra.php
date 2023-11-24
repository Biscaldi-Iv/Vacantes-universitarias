<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Universidad;
use App\Models\Vacantes;

class Catedra extends Model
{
    use HasFactory;
    protected $fillable = [
        'idCatedra',
        'fkIdUniversidad',
        'nombreCatedra',
        'descripcion'
    ];

    public function universidad()
    {
        return $this->hasOne(Universidad::class, 'idUniversidad','fkIdUniversidad');
    }

    public function vacantes()
    {
        return $this->hasMany(Vacantes::class,'fkIdCatedra','idCatedra');
    }
}
