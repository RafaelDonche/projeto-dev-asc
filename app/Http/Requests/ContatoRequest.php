<?php

namespace App\Http\Requests;

use App\Rules\CsvExtensionRule;
use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'campanha' => 'required|max:255',
            'arquivo' => ['required', 'file', new CsvExtensionRule]
        ];
    }

    public function messages()
    {
        return [
            'campanha.required' => 'O campo campanha é obrigatório',
            'campanha.max' => 'O campo campanha deve ter no máximo 255 caracteres',

            'arquivo.required' => 'O campo arquivo é obrigatório',
            'arquivo.file' => 'O campo arquivo deve receber um arquivo válido'
        ];
    }
}
