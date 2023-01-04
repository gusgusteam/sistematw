<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallecarritoTable extends Migration
{
    public function up()
    {
        Schema::create('detallecarrito', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('refPedido')->unsigned()->nullable();

            $table->integer('estado')->unsigned()->default(0);

            $table->integer('idCarrito')->unsigned();
            $table->foreign('idCarrito')->references('id')->on('carrito')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('idProducto')
            ->nullable()
            ->references('id')
            ->nullable()
            ->on('productos')
            ->onDelete('cascade');
            
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('detallecarrito');
    }
}
