<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';

    protected $primaryKey = 'id_proveedor';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['rfc', 
                           'email', 
                           'comentarios', 
                           'calle',
                           'entre_calles',
                           'no_exterior',
                           'no_interior',
                           'cod_postal',
                           'colonia',
                           'localidad',
                           'ciudad',
                           'entidad_fed',
                           'pais', 
                           'estatus'];

    
    public function proveedorFis() {
		  return $this->hasOne('App\Models\ProveedorFisico', 'id_proveedor');
	}

    public function proveedorMor() {
        return $this->hasOne('App\Models\ProveedorMoral', 'id_proveedor');
  }
}
