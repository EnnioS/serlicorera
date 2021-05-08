<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Factura;
use App\Producto;

class Detalle extends Model
{

    protected $fillable =   [
                                'factura_id',
                                'producto_id',
                                'punitario',
                                'cantidad',
                                'total'
                            ];

    public function factura()
    {
        return $this->belongsTo(Factura::class,'factura_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class,'producto_id');
    }
}
