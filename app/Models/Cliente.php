<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';

    protected $primaryKey = 'id_cliente';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['rfc', 
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

    
    public function clienteFis() {
		  return $this->hasOne('App\Models\ClienteFisico', 'id_cliente');
	}

    public function clienteMor() {
        return $this->hasOne('App\Models\ClienteMoral', 'id_cliente');
  }
}
