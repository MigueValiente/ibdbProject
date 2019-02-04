<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
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
          'name'         => 'required|min:5',
          'address'        => ['required','min:10'],
          'web'    => 'required',
          'email' => 'required|email'
      ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'El :attribute es requerido.',
            'name.min' => 'El :attribute debe tener al menos 5 caracteres',
            'address.required'=> 'El :attribute es requerido.',
            'address.min'    => 'El :attribute debe tener al menos 10 caracteres',
            'web.required'=> 'La :attribute es requerida.',
            'email.required'=> 'El :attribute es requerido',
            'email.email' => 'El :attribute no cumple con los requisitos'
        ];
    }

    public function attributes()
    {
        return [
            'name'     => 'nombre de la editorial',
            'address'    => 'direccion',
            'web' => 'url',
            'email' => 'email'
        ];
    }
}
