<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validation_Teacher extends FormRequest
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
            'name' => 'required',
            'surname' => 'required',
            'age' => 'required',
            'profession' => 'required',
        ];
    }



    public function messages()
    {
        return [
            
            'name.required' => 'O nome é obrigatorio',

            'surname.required' => 'O sobrenome é obrigatorio',

            'age.required' => ' Idade é obrigatoria',

            'profession.required' => 'A profissão é obrigatoria',
            
        

        ];
    }




}
