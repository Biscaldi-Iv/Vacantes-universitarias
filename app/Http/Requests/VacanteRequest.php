<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacanteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'idVacante' => 'required',
        'idCatedra' => 'required',
        'tituloVacante' => 'required',
        'descCorta',
        'descCompleta' => 'required',
        'titulosRequeridos' => 'required',
        'horarioJornada' => 'required',
        'fechaPublicacion' => 'required',
        'fechaCierra' => 'required',
        ];
    }
}
