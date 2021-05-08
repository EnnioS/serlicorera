<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fact_id')->unique();
            $table->unsignedBigInteger('cliente_id')->index();
            $table->foreign('cliente_id','fk_fact_client')->references('id')->on('clientes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedDecimal('subtotal',10,2);
            $table->unsignedDecimal('iva',10,2);
            $table->unsignedDecimal('total',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
