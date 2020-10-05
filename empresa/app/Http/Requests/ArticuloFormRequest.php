<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloFormRequest extends FormRequest
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
          'idCategoria'=>'required',
          'idMarca'=>'required',
          'nombre'=>'required|max:100',
          'codigo'=>'required|max:100',
          'descripcion'=>'max:512',
          'imagen'=> 'mimes:jpeg,jpg,png|max:1000',
          'caducidad'=>'max:100',
          'estado'=>'max:100',

        ];
    }
}
