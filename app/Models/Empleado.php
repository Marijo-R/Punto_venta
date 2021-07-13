<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleado';
    protected $primaryKey = 'id_empleado';
    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable =['alias',
                          'nombre',
                          'primer_apellido',
                          'segundo_apellido',
                          'nss',
                          'curp',
                          'fecha_nac',
                          'email',
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
                          'comentarios',
                          'limite_credito',
                          'dias_credito',
                          'frecuente',
                          'estatus'];

    
    public function usuario() {
        return $this->hasOne('App\Models\User', 'id_empleado');
    }

    public function puesto() {
        return $this->belongsTo('App\Models\Puesto','id_empleado');
    }
}
