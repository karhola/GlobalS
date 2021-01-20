<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_compra');
            $table->date('fecha_compra');
            $table->integer('costo_importacion_total');
            $table->integer('total_compra');
            $table->foreignId('proveedor_id');   
            $table->timestamps();
        });
        Schema::create('compra_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id');
            $table->foreignId('compra_id');
            $table->integer('cantidad');
            $table->integer('subtotal');
            $table->integer('coste_importacion');
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
        Schema::dropIfExists('compra');
    }
}
