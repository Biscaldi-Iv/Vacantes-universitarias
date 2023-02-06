<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmacion'=>'required|same:password',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'privilegio' => 'required',
            'telefono'=>'required',
            'tipodoc'=>'required',
            'ndoc'=>'required',
            // 'ndoc' => Rule::unique(['users'])->where(fn ($query) => $query->where('tipodoc')),
        ];
    }
}
