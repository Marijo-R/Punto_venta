<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productoCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_usuario',
            'codigo', 
            'codigo_alterno', 
            'nombre', 
            'descripcion', 
            'marca', 
            'utilidad_porcentaje', 
            'stock', 
            'stock_max', 
            'stock_min',
            'id_medida', 
            'precio_mayoreo', 
            'precio_menudeo', 
            'comision_porcentaje', 
            'codigo_sat', 
            'unidad_sat'
        ];
    }
}
