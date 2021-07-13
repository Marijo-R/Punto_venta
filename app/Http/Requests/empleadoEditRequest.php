<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class empleadoEditRequest extends FormRequest
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
            'alias' => ['required', 'alpha', 'min:3', 'max:15'/* , 'unique:empleado' */], 
            'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u','min:3','max:50'/* , 'unique:empleado' */], 
            'primer_apellido' => ['required', 'alpha','min:3','max:50'/* , 'unique:empleado' */],  
            'segundo_apellido' => ['nullable','alpha','min:3','max:50', /* 'unique:empleado' */], 
            'nss' => ['required', 'digits:11','numeric', /* 'unique:empleado' */],
            'curp' => ['required', 'regex:([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)', 
                        'max:18',/* 'unique:empleado' */], 
            'fecha_nac' => ['required', 'date_format:Y-m-d'], 
            'email' => ['required', 'string','email','max:70', /* 'unique:empleado' */], /* 
            'tipo' => ['required'], */ 
            'telefono' => [/* 'requerido', */'numeric','digits:10', /* 'unique:telefono' */], 
            'calle' => ['required', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/','min:7', 'max:100'], 
            'entre_calles' => ['required', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/','min:7', 'max:100'], 
            'no_interior' => ['nullable','alpha_num','min:1','max:7','not_in:0'], 
            'no_exterior' => ['required','alpha_num','min:1','max:7','not_in:0'],  
            'cod_postal' => ['required', 'numeric', 'digits:5'], 
            'colonia' => ['required', 'regex:/^[\pL\s\-]+$/u', 'alpha','min:4', 'max:30'], 
            'localidad' => ['required', 'regex:/^[\pL\s\-]+$/u','min:4',  'max:30'], 
            'ciudad' => ['required', 'regex:/^[\pL\s\-]+$/u', 'alpha','min:4',  'max:30', ], 
            'entidad_fed' => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:5',  'max:31'], 
            'pais' => ['required', 'regex:/^[\pL\s\-]+$/u', 'alpha', 'min:4','max:30']
        ];
    }
}
