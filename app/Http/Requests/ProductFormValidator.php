<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormValidator extends FormRequest
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
            'nombre' => 'required|string|max:255',
            // 'referencia' => 'required|max:255|unique:referencia',
            'referencia' => 'required|max:255',
            'precio' => 'required|max:255',
            'categoria' => 'required|string|max:255',
            'peso' => 'required|max:255'
        ];
    }
}
