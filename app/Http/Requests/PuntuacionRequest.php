<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuntuacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fkIdVacante'=>'required|integer|min:1',
            'fkIdUsuario'=>'required|integer|min:1',
            'titulo'=>'nullable|between:0,10|integer',
            'experiencia'=>'nullable|between:0,10|integer',
            'con_asignatura'=>'nullable|between:0,10|integer',
            'publicaciones'=>'nullable|between:0,10|integer',
            'congresos'=>'nullable|between:0,10|integer',
            'actitud'=>'nullable|between:0,10|integer',
            'disponibilidad'=>'nullable|between:0,10|integer',
            'entrevista'=>'nullable|between:0,10|integer',
            'sueldo'=>'nullable|between:0,10|integer',
            'investigaciones'=>'nullable|between:0,10|integer'
        ];
    }
}
