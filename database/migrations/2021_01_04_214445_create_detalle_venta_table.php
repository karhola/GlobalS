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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_v');
            $table->date('fecha_venta');
            $table->integer('total_venta');
            $table->integer('beneficio_total_promotor');
            $table->integer('beneficio_total_oficina');
            $table->foreignId('promotor_id');                         
            $table->timestamps();
        });

        Schema::create('producto_venta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id');
            $table->foreignId('venta_id');
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
