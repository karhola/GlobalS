<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_promotor',45);
            $table->string('apellido_promotor',45);
            $table->string('direccion_promotor',225);
            $table->integer('celular_promotor');
            $table->date('fecha_nacimiento');
            $table->integer('ci_promotor');
            $table->timestamps();
        });

        Schema::create('pedido_promotor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promotor_id');
            $table->foreignId('pedido_id');
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
        Schema::dropIfExists('promotors');
    }
}
