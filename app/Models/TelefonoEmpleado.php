<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonoEmpleado extends Model
{
    use HasFactory;

    protected $table = 'telefono_empleado';

    protected $primaryKey = 'id_tel_empleado';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['id_telefono', 'id_empleado'];

    
    public function empleado()
    {
        return $this->belongsTo('App\Models\Empleado','id_empleado');
    }

    public function telefono()
    {
        return $this->belongsTo('App\Models\Telefono','id_telefono');
    }
}
