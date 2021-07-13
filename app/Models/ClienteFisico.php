<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteFisico extends Model
{
    use HasFactory;

    protected $table = 'cliente_fisico';

    protected $primaryKey = 'id_fis_cliente';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['id_fisico', 'id_cliente', 'estatus'];

    
    public function clienteFis()
    {
        return $this->belongsTo('App\Models\Cliente','id_cliente');
    }

    public function fisicoCliente()
    {
        return $this->belongsTo('App\Models\Fisico','id_fisico');
    }
}
