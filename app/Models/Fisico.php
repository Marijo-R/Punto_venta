<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fisico extends Model
{
    use HasFactory;

    protected $table = 'fisico';

    protected $primaryKey = 'id_fisico';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['nombre', 'primer_apellido', 'segundo_apellido', 'curp', 'estatus'];

    
    public function fisicoProv() {
		return $this->hasOne('App\Models\ProveedorFisico', 'id_fisico');
    }

    public function fisicoClie() {
		return $this->hasOne('App\Models\ClienteFisico', 'id_fisico');
    }
}
