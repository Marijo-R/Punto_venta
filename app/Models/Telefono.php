<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    protected $table = 'telefono';

    protected $primaryKey = 'id_telefono';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['telefono', 'tipo', 'estatus'];

    public function telefonoEmp() {
		return $this->hasOne('App\Models\TelefonoEmpleado', 'id_telefono');
    }

    public function telefonoProv() {
		return $this->hasOne('App\Models\TelefonoProveedor', 'id_telefono');
    }

    public function telefonoClie() {
		return $this->hasOne('App\Models\TelefonoCliente', 'id_telefono');
    }
}
