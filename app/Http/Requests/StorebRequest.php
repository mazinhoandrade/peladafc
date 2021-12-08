<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorebRequest extends FormRequest
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
            //'data' => ['required','string'],
            'falhas' => ['required', 'min:0' ],
            'gols' => ['required', 'min:0' ],
            'assis' => ['required', 'min:0'],
            'capa' => ['required','min:0'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'numeric' => 'O campo :attribute só e aceito numeros',
            'min' => 'O :attribute não deve ser menor que 0'
        ];
    }

}
