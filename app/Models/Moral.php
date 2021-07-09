<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moral extends Model
{
    use HasFactory;

    protected $table = 'moral';

    protected $primaryKey = 'id_moral';

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'ult_modificacion';

    protected $fillable = ['razon_social', 'estatus'];

    
    public function moralProv() {
		return $this->hasOne('App\Models\ProveedorMoral', 'id_moral');
    }

    public function moralClie() {
		return $this->hasOne('App\Models\ClienteMoral', 'id_moral');
    }
}
