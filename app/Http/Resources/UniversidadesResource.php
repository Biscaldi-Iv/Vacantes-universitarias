<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UniversidadesResource extends JsonResource
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
            'idUniversidad'         => $this->idUniversidad,
            'nombreUniversidad'     => $this->nombreUniversidad,
            'direccionUniversidad'  => $this->direccionUniversidad,
            'telefono'              => $this->telefono,
            'emailRRHH'             => $this->emailRRHH,
            'sitioWeb'              => $this->sitioWeb,
            'catedras'              => CatedrasResource::collection($this->whenLoaded('catedras'))
        ];
    }
}
