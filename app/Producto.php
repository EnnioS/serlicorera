<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $fillable =   [
                                'sku',
                                'descripcion',
                                'pdolar',
                                'pcordobas',
                                'activo'
                            ];

    public function detalle(){
        return $this->hasMany(Detalle::class,'producto_id');
    }
}
