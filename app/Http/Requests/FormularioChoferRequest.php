<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormularioChoferRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|min:1|max:30',
            'surname'    => 'required|min:1|max:30',
            'number'    => 'required|min:6|max:20',
            'email'         => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => 'El :attribute es obligatorio.',
            'name.min'        => 'El :attribute debe contener mas de una letra.',
            'name.max'        => 'El :attribute debe contener max 30 letras.',

            'surname.required'   => 'El :attribute es obligatorio.',
            'surname.min'        => 'El :attribute debe contener mas de una letra.',
            'surname.max'        => 'El :attribute debe contener max 30 letras.',

            'number.required'   => 'El :attribute es obligatorio.',
            'number.min'        => 'El :attribute debe contener mas de seis numeros.',
            'number.max'        => 'El :attribute debe contener max 20 numeros.',

            'email.required'        => 'El :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'name'        => 'nombre',
            'surname'    => 'apellido',
            'number'    => 'teléfono',
            'email'         => 'correo electrónico',
        ];
    }
}
