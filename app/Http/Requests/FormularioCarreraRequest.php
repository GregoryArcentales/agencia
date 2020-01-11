<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormularioCarreraRequest extends FormRequest
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
            'select'                  => 'required|not_in:0',
            'dirSalida'             => 'required|min:1|max:40',
            'dirDestino'            => 'required|min:1|max:40',
            'valCarrera'            => 'required|min:1|max:10',
            'gastoCarrera'      => 'required|min:1|max:10',
        ];
    }

    public function messages()
    {
        return [
            'select.required'   => 'El :attribute es obligatorio.',

            'dirSalida.required'   => 'El :attribute es obligatorio.',
            'dirSalida.min'        => 'El :attribute debe contener mas de una letra.',
            'dirSalida.max'        => 'El :attribute debe contener max 40 letras.',

            'dirDestino.required'   => 'El :attribute es obligatorio.',
            'dirDestino.min'        => 'El :attribute debe contener mas de una letra.',
            'dirDestino.max'        => 'El :attribute debe contener max 40 letras.',

            'valCarrera.required'   => 'El :attribute es obligatorio.',
            'gastoCarrera.required'   => 'El :attribute es obligatorio.',

        ];
    }

    public function attributes()
    {
        return [
            'select'        => 'seleccionar',
            'dirSalida'    => 'dirección de salida',
            'dirDestino'    => 'dirección de destino',
            'valCarrera'         => 'valor',
            'gastoCarrera'         => 'gasto',
        ];
    }
}
