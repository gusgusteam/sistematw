<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_almacen', function (Blueprint $table) {
            $table->id();
            $table->integer('stock')->unsigned();

            $table->foreignId('idProducto')
            ->nullable()
            ->references('id')
            ->nullable()
            ->on('productos')
            ->onDelete('cascade');
           
            $table->foreignId('idAlmacen')
            ->nullable()
            ->references('id')
            ->nullable()
            ->on('almacenes')
            ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('producto_almacen');
    }
}
