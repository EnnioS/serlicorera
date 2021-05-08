<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Factura;

class Cliente extends Model
{
    protected $fillable = ['nombre','direccion','activo'];
    public function factura(){
        return $this->hasMany(Factura::class,'cliente_id');
    }
}
