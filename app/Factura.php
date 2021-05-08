<?php

namespace App;
use App\Cliente;
use App\Detalle;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{

    protected $fillable =   [
                                'fact_id',
                                'cliente_id',
                                'subtotal',
                                'iva',
                                'total'
                            ];

    public function detalle(){
        return $this->hasMany(Detalle::class,'factura_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

}
