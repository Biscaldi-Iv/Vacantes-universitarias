<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return['id' => $this->id,
        'email' => $this->email,
        'password' => $this->password,
        'nombre' => $this->nombre,
        'apellido' => $this->apellido,
        'direccion' => $this->direccion,
        'telefono' => $this->telefono,
        'tipodoc' => $this->tipodoc,
        'ndoc' => $this->ndoc,
        'privilegio' => $this->privilegio,
        'personalUniversitario' =>  PersonalUniversitarioResource::collection($this->whenLoaded('personalUniversidad'))] ;
    }
}
