<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
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
            'date'       => 'required',
            'user_id'    => 'required',
            'doctor_id'  => 'required',
            'patient_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'date.required'       => 'Obrigatório!',
            'user_id.required'    => 'Obrigatório!',
            'doctor_id.required'  => 'Obrigatório!',
            'patient_id.required' => 'Obrigatório!',
        ];
    }
}
