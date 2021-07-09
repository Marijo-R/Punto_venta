<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //use HasFactory;
    
    protected $table = 'producto';

    protected $primaryKey = 'id_producto';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['id_usuario',
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
                            'unidad_sat', 
                            'estatus'
                            ];

    
    public function medida()
    {
        return $this->belongsTo('App\Models\TipoMedida','id_medida');
    }

    public function producto()
    {
        return $this->belongsTo('App\Models\User','id');
    }
}
