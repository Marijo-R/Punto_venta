<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class proveedorMorEditRequest extends FormRequest
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
            'razon_social' => ['required','string', 'min:15','max:100'],
            'rfc' => ['required'],
            'email' => ['required', 'string','email','max:70'], 
            'tipo' => ['required'], 
            'telefono' => ['required','numeric','digits:10'], 
            'calle' => ['required', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/','min:2', 'max:100'], 
            'entre_calles' => ['nullable', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/','min:2', 'max:100'], 
            'no_interior' => ['nullable','alpha_num','min:1','max:7','not_in:0'], 
            'no_exterior' => ['required','alpha_num','min:1','max:7','not_in:0'], 
            'cod_postal' => ['required', 'numeric', 'digits:5'], 
            'colonia' => ['required', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', 'alpha','min:4', 'max:30'], 
            'localidad' => ['required', 'regex:/^[\pL\s\-]+$/u','min:4',  'max:30'], 
            'ciudad' => ['required', 'regex:/^[\pL\s\-]+$/u', 'alpha','min:4',  'max:30', ], 
            'entidad_fed' => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:5',  'max:31'], 
            'comentarios' => ['nullable', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', 'min:4','max:255'],
        ];
    }
}
