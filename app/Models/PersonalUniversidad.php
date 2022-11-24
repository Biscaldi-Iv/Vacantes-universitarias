<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalUniversidad extends Model
{
    use HasFactory;

    protected $fillable=[
        'idUP',
        'fkIdUser',
        'fkIdUni'
    ];
}
