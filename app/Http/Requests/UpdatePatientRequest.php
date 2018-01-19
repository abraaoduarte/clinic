<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'birthday'              => 'required',
            'address'               => 'required',
            'number_address'        => 'required',
            'zipcode'               => 'required',
            'name'                  => 'required',
            'cpf'                   => 'required|unique:patients,cpf,'.$this->id,
            'rg'                    => 'required|unique:patients,rg,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required'                    => 'Nome Obrigatório!',
            'birthday.required'                => 'Data de Nascimento Obrigatório!',
            'address.required'                 => 'Endereço Obrigatório!',
            'number_address.required'          => 'Numero Obrigatório!',
            'zipcode.required'                 => 'Cep Obrigatório!',
            'cpf.required'                     => 'Cpf Obrigatório!',
            'cpf.unique'                       => 'Este CPF já está cadastrado!',
            'rg.required'                      => 'RG Obrigatório!',
            'rg.unique'                        => 'Este RG já está cadastrado!',
        ];
    }
}
