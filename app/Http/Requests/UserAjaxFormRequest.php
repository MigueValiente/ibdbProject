<?php

namespace App\Http\Requests;

use Illuminate\Validation\ValidationException;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;


class UserAjaxFormRequest extends UserFormRequest
{

    public function rules()
    {
        $rules = array();

        if($this->exists('name')){
          $rules['name'] = $this->validarNombre();
        }

        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $response = new JsonResponse([
          'name' => $errors->get('name')
        ]);

        throw new ValidationException($validator,$response);
    }

}
