<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagen');

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
        Schema::dropIfExists('imagenes');
    }
}
