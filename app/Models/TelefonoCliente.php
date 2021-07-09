<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonoCliente extends Model
{
    use HasFactory;

    protected $table = 'telefono_cliente';

    protected $primaryKey = 'id_tel_cliente';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['id_telefono', 'id_cliente'];

    
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente','id_cliente');
    }

    public function telefono()
    {
        return $this->belongsTo('App\Models\Telefono','id_telefono');
    }
}
