<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveedorMoral extends Model
{
    use HasFactory;

    protected $table = 'proveedor_moral';

    protected $primaryKey = 'id_mor_proveedor';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['id_moral', 'id_proveedor', 'estatus'];

    
    public function proveedorMor()
    {
        return $this->belongsTo('App\Models\Proveedor','id_proveedor');
    }

    public function moralProv()
    {
        return $this->belongsTo('App\Models\Moral','id_moral');
    }
}
