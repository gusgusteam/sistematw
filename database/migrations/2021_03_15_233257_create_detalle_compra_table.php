<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad')->unsigned();
            $table->float('subTotal');

            $table->foreignId('idProductoAlmacen')
            ->nullable()
            ->references('id')
            ->nullable()
            ->on('producto_almacen')
            ->onDelete('cascade');

            $table->foreignId('idNotaCompra')
            ->nullable()
            ->references('id')
            ->nullable()
            ->on('nota_compra')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compra');
    }
}
