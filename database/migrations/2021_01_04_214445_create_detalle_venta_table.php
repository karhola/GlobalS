<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_v');
            $table->integer('fecha_venta');
            $table->integer('total_venta');
            $table->integer('beneficio_total_promotor');
            $table->integer('beneficio_total_oficina');
            $table->foreignId('promotor_id');                         
            $table->timestamps();
        });

        Schema::create('producto_detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id');
            $table->foreignId('detalle_venta_id');
            $table->integer('comision');
            $table->integer('cantidad');
            $table->integer('subtotal');
            $table->integer('beneficio_subtotal_promotor');
            $table->integer('beneficio_subtotal_oficina');
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
        Schema::dropIfExists('detalle_venta');
    }
}