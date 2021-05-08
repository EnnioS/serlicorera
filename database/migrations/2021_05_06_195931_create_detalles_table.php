<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('factura_id')->index();
            $table->foreign('factura_id','fk_detail_fact')->references('id')->on('facturas')->onDelete('restrict')->onUpdate('restrict');
            $table->string('producto_id',10)->index();
            $table->foreign('producto_id','fk_detail_prod')->references('id')->on('productos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedDecimal('punitario',10,2);
            $table->integer('cantidad');
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
        Schema::dropIfExists('detalles');
    }
}
