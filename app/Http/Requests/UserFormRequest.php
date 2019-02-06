<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        $rules = array();

        $rules['name'] = $this->validarNombre();
        $rules['email'] = $this->validarEmail();

        return $rules;
    }

    public function messages()
    {
        $mensajesNombre = $this->mensajeNombre();
        $mensajesEmail = $this->mensajesEmail();

        $mensajes = array_merge($mensajesNombre,$mensajesEmail);
        return $mensajes;
    }

    protected  function validarNombre()
    {
      return 'required|string|max:10';
    }

    protected  function validarEmail()
    {
      return 'required|email';
    }

    protected function mensajeNombre()
    {
      $mensajes = array();
      $mensajes['name.required']="El nombre es requerido";
      $mensajes['name.string']="El nombre debe ser una cadena";
      $mensajes['name.max']="El nombre tiene un maximo de 10 caracteres";

      return $mensajes;
    }

    protected function mensajesEmail()
    {
      $mensajes = array();
      $mensajes['email.required']="El email es requerido";
      $mensajes['email.email']="El email no cumple con el formato requerido";

      return $mensajes;
    }
}
