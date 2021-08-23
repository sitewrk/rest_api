<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class ApiRequest extends FormRequest
{

    /**
     * HK
     * Авторизация и валидация
     */
    public function authorize(){
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
       throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
