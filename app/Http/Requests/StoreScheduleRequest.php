<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
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
            'date'       => 'required|date_format:d/m/Y H:i',
            'doctor_id'  => 'required',
            'patient_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'date.required'       => 'Obrigatório!',
            'date.date_format'    => 'Formato Incorreto!',            
            'doctor_id.required'  => 'Obrigatório!',
            'patient_id.required' => 'Obrigatório!',
        ];
    }
}
