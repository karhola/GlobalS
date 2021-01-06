<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_compra');
            $table->date('fecha_compra');
            $table->integer('costo_importacion_total');
            $table->integer('total_compra');
            $table->foreignId('proveedor_id');                         
            $table->timestamps();
        });
        
        Schema::create('producto_detalle_compra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id');
            $table->foreignId('detalle_compra_id');
            $table->integer('cantidad');
            $table->integer('subtotal');
            $table->integer('coste_importacion');
            $table->timestamps();

        });{}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compras');
    }
}
