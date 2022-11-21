<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostulanteRequest extends FormRequest
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
            'titulos' => 'string|nullable',
            'experiencia'=>'string|nullable',
            'con_asignatura' => 'string|nullable',
            'disponibilidad' => 'string|nullable',
            'congresos' => 'string|nullable',
            'educacion' => 'string|nullable',
            'publicaciones'=>'string|nullable',
            'investigaciones'=>'string|nullable',
            'con_profesionales'=>'string|nullable'
        ];
    }
}
