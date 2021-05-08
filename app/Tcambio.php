<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tcambio extends Model
{
    protected $fillable =   [
                                'Fecha',
                                'tasa'
                            ];
}
