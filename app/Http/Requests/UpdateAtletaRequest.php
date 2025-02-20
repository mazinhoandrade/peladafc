<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAtletaRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:100', ],
            'posi' => ['required', 'string'],
            //'data' => ['required','string'],
            'avatar' => ['mimes:jpeg,jpg,png','max:200']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório'
        ];
    }
    
}
