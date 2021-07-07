<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMedida extends Model
{
    //use HasFactory;

    protected $table = 'tipo_medida';

    protected $primaryKey = 'id_medida';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['unidad_medida', 'simbolo', 'estatus'];

    
    public function medida() {
		  return $this->hasOne('App\Models\Producto', 'id_medida');
	}
}
