<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            'name'           => 'required',
            'birthday'       => 'required',
            'gender'         => 'required',
            'cpf'            => 'required|unique:doctors',
            'email'          => 'required|email|unique:doctors',
            'crm'            => 'required|unique:doctors',
            'speciality'     => 'required',
            'address'        => 'required',
            'number_address' => 'required',
            'city'           => 'required',
            'state'          => 'required',
            'country'        => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required'           => 'Nome Obrigatório!',
            'birthday.required'       => 'Data Obrigatório!',
            'gender.required'         => 'Sexo Obrigatório!',
            'cpf.required'            => 'CPF Obrigatório!',
            'cpf.unique'              => 'Este CPF já foi cadastrado!',
            'email.required'          => 'Email Obrigatório!',
            'email.email'             => 'Formato do Email inválido!',
            'email.unique'            => 'Este email já foi cadastrado!',
            'crm.required'            => 'CRM Obrigatório!',
            'crm.unique'              => 'Este CRM já foi cadastrado',
            'address.required'        => 'Endereço Obrigatório!',
            'number_address.required' => 'Obrigatório!',
            'city.required'           => 'Obrigatório!',
            'state.required'          => 'Obrigatório!',
            'country.required'        => 'Obrigatório!',
            'speciality.required'     => 'Obrigatório!',
        ];
    }
}
