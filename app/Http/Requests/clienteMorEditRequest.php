<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clienteMorEditRequest extends FormRequest
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
            'no_cliente' => ['required','string', 'max:10'/* , 'unique:cliente' */],
            'razon_social' => ['required','string', 'min:25','max:100'],
            'rfc' => ['required'/* , 'regex:/^[A-Z]{3,4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/' *//* , 'unique:cliente' */],
            'email' => ['required', 'string','email','max:70'/* , 'unique:cliente' */], 
            'tipo' => ['required'], 
            'telefono' => ['required','numeric','digits:10', 'unique:telefono'], 
            'calle' => ['required', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/','min:7', 'max:100'], 
            'entre_calles' => ['required', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/','min:7', 'max:100'], 
            'no_interior' => ['nullable','alpha_num','min:1','max:7','not_in:0'], 
            'no_exterior' => ['required','alpha_num','min:1','max:7','not_in:0'], 
            'cod_postal' => ['required', 'numeric', 'digits:5'], 
            'colonia' => ['required', 'regex:/^[\pL\s\-]+$/u', 'alpha','min:4', 'max:30'], 
            'localidad' => ['required', 'regex:/^[\pL\s\-]+$/u','min:4',  'max:30'], 
            'ciudad' => ['required', 'regex:/^[\pL\s\-]+$/u', 'alpha','min:4',  'max:30', ], 
            'entidad_fed' => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:5',  'max:31'], 
            'pais' => ['required', 'regex:/^[\pL\s\-]+$/u', 'alpha', 'min:4','max:30'],
            'limite_credito' => ['required', 'numeric'],
            'dias_credito' => ['required', 'numeric'],
            'comentarios' => ['required', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', 'min:4','max:255'],
            'frecuente' => ['required', 'string', 'max:10'],
        ];
    }
}
