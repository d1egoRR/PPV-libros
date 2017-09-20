<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetallefactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('factura_id')->unsigned();
            $table->foreign('factura_id')->references('id')->on('factura');
            $table->integer('libro_id')->unsigned();
            $table->foreign('libro_id')->references('id')->on('libros');
            $table->integer('cantidad');
            $table->float('precio', 4, 2);
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
        Schema::dropIfExists('detalle_factura');
    }
}
