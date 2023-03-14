<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaFormRequest extends FormRequest
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
          'nombreEmpresa'=>'required|max:255',
          'direccion'=>'required|max:100',
          'ruc'=>'max:45',
          'telefono'=>'required|max:45',
          'correo'=>'required|max:100',
          'descripcion'=>'max:512',
          'latitud'=>'max:512',
          'longitud'=>'max:512',
        ];
    }
}
