<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->default('')->nullable();
            $table->string('codigo')->default('')->nullable();
            $table->float('precioVenta')->nullable()->default(10);
            $table->float('precioCompra')->nullable()->default(10);
            $table->string('imagen')->nullable()->default('imagenes/0pe1FF2ycagYFBhutumoPYMfEpX7Oolh7OzqDrtr.png');

            
            $table->foreignId('idTipo')
                ->nullable()
                ->references('id')
                ->on('tipos')
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
        Schema::dropIfExists('productos');
    }
}
