<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonoProveedor extends Model
{
    use HasFactory;

    protected $table = 'telefono_proveedor';

    protected $primaryKey = 'id_tel_proveedor';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['id_telefono', 'id_proveedor'];

    
    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor','id_proveedor');
    }

    public function telefono()
    {
        return $this->belongsTo('App\Models\Telefono','id_telefono');
    }
}
