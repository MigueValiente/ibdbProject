<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title'         => 'required|min:3',
            'publisher'     => 'required|exists:publishers,id',
            'description'   => 'required',
            'author'        => 'required|exists:authors,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=> 'El :attribute es requerido.',
            'title.min' => 'El :attribute debe tener al menos 3 caracteres',
            'publisher.required' =>'Debe elegir una :attribute',
            'publisher.exists'    => 'La :attribute no existe',
            'description.required'=> 'La :attribute es requerida.',
            'author.required' => 'Debe seleccionar uno o varios :attribute',
            'author.exists' => 'El o los :attribute no existen'
        ];
    }

    public function attributes()
    {
        return [
            'title'     => 'título del libro',
            'author'    => 'autores del libro',
            'publisher' => 'editorial',
            'description' => 'descripción del libro'
        ];
    }
}
