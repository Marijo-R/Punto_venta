<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class proveedorFisEditRequest extends FormRequest
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
            'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u','min:3','max:50'], 
            'primer_apellido' => ['required', 'alpha','min:3','max:50'],  
            'segundo_apellido' => ['nullable','alpha','min:3','max:50'],
            'curp' => ['required', 'regex:([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)', 
                        'min:18','max:18'], 
            'rfc' => ['required', 'regex:([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)', 
                        'min:12','max:13'],
            'email' => ['required', 'string','email','max:70'], 
            'tipo' => ['required'], 
            'telefono' => ['required','numeric','digits:10'], 
            'calle' => ['required', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/','min:2', 'max:100'], 
            'entre_calles' => ['nullable', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/','min:2', 'max:100'], 
            'no_interior' => ['nullable','alpha_num','min:1','max:7','not_in:0'], 
            'no_exterior' => ['required','alpha_num','min:1','max:7','not_in:0'], 
            'cod_postal' => ['required', 'numeric', 'digits:5'], 
            'colonia' => ['required', 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', 'alpha','min:3','max:50'], 
            'localidad' => ['required', 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/','min:4',  'max:30'], 
            'ciudad' => ['required', 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', 'alpha','min:4',  'max:30', ], 
            'entidad_fed' => ['required', 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', 'min:5',  'max:31'], 
            'pais' => ['required', 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', 'alpha', 'min:4','max:30'],
            'comentarios' => ['nullable', 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', 'alpha_num', 'min:4','max:255'],
        ];
    }
}
