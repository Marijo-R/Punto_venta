<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteMoral extends Model
{
    use HasFactory;

    protected $table = 'cliente_moral';

    protected $primaryKey = 'id_mor_cliente';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['id_moral', 'id_cliente', 'estatus'];

    
    public function clienteMor()
    {
        return $this->belongsTo('App\Models\Cliente','id_cliente');
    }

    public function moralCliente()
    {
        return $this->belongsTo('App\Models\Moral','id_moral');
    }
}
