<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $table = 'puesto_empleado';
    protected $primaryKey = 'id_puesto';
    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable =['puesto','estatus'];

    public function empleado() {
        return $this->hasOne('App\Models\Empleado','id_puesto');
    }
}
