<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveedorFisico extends Model
{
    use HasFactory;

    protected $table = 'proveedor_fisico';

    protected $primaryKey = 'id_fis_proveedor';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['id_fisico', 'id_proveedor', 'estatus'];

    
    public function proveedorFis()
    {
        return $this->belongsTo('App\Models\Proveedor','id_proveedor');
    }

    public function fisicoProv()
    {
        return $this->belongsTo('App\Models\Fisico','id_fisico');
    }
}
