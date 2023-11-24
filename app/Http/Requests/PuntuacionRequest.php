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
            'titulo'=>'nullable|integer',
            'experiencia'=>'nullable|integer',
            'con_asignatura'=>'nullable|integer',
            'publicaciones'=>'nullable|integer',
            'congresos'=>'nullable|integer',
            'actitud'=>'nullable|integer',
            'disponibilidad'=>'nullable|integer',
            'entrevista'=>'nullable|integer',
            'sueldo'=>'nullable|integer',
            'investigaciones'=>'nullable|integer'
        ];
    }
}
