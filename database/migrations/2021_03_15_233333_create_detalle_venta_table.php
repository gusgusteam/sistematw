<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{

    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad')->unsigned();
            $table->float('subTotal');

            $table->foreignId('idProductoAlmacen')
            ->nullable()
            ->references('id')
            ->nullable()
            ->on('producto_almacen')
            ->onDelete('cascade');


            $table->foreignId('idNotaVenta')
            ->nullable()
            ->references('id')
            ->nullable()
            ->on('nota_venta')
            ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('detalle_venta');
    }
}
