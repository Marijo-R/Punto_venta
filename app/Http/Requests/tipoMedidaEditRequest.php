<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tipoMedidaEditRequest extends FormRequest
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
            'unidad_medida' => ['required', 'regex:/^[\pL\s\-]+$/u','min:4'],
            'simbolo' => ['required', 'regex:/^[\pL\s\-]+$/u','min:2'],
        ];
    }
}
