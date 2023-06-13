<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
{
    return [
        'nombre' => 'required|string|max:20',
        'apellido' => 'required|string|max:50',
        'fechaNac' => 'required|date',
        'genero' => 'required|string|max:255',
        'telefono' => 'required|numeric',
        'departamento_id' => 'required|exists:departamentos,id',
    ];
}
}
