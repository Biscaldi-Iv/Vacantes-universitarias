<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Usuario;
use App\Models\PersonalUniversidad;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'email',
        'password',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'tipodoc',
        'ndoc',
        'privilegio'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = $value;
    }

    public function usuario()
    {
        if($this->privilegio==1){
            return $this->hasOne(Usuario::class,'fkiduser','id');
        }
        return null;
    }

    public function personalUniversidad(){
        if($this->privilegio==2){
            return $this->hasOne(PersonalUniversidad::class,'fkIdUser','id');
        }
        return null;
    }

    public function getId(){
        return $this->id;
    }
}
