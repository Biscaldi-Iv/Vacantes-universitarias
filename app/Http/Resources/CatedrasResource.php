<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatedrasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'idCatedra'         => $this->idCatedra,
            'fkIdUniversidad'   => $this->fkIdUniversidad,
            'nombreCatedra'     => $this->nombreCatedra,
            'descripcion'       => $this->descripcion,
        ];
    }
}
