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
            $table->string('pfoto');
            $table->string('nombre_producto');
            $table->string('descripcion_producto');
            $table->integer('pcompra_producto');
            $table->integer('pventa_producto');
            $table->integer('stock_producto');
            $table->integer('activo')->default(false);
            $table->date('fecha_caducidad');
            $table->integer('beneficio_promotor');
            $table->integer('beneficio_oficina');
            $table->foreignId('categoria_id');
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
        Schema::dropIfExists('productos');
    }
}
