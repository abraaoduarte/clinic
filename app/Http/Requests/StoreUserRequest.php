<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',

        ];
    }

    public function messages()
    {
        return [
            'name.required'                    => 'Nome Obrigatório!',
            'email.required'                   => 'Email Obrigatório!',
            'email.email'                      => 'Email inválido: user@domain.com!',
            'email.unique'                     => 'Este email já está cadastrado!',
            'password.required'                => 'Senha Obrigatório!',
            'password.min'                     => 'Mínimo 6 caracteres!',
            'password.confirmed'               => 'Confirme a senha!!',
            'password_confirmation.required'   => 'Confirme a senha!',
            'password_confirmation.min'        => 'Mínimo 6 Caracteres!',

        ];
    }
}
