<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_clientes', function (Blueprint $table) {
            $table->increments('ec_id');
            $table->integer('eve_id');
            $table->integer('arr_id');
            $table->string('ec_nombreCliente');
            $table->string('ec_cedula');
            $table->string('ec_celular');
            $table->string('ec_numPersonas');
            $table->date('ec_fecha');
            $table->time('ec_hora');
            $table->string('ec_descripcion');
            $table->string('ec_estado');
            $table->integer('sm_id');
            $table->string('tc_id');
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
        Schema::dropIfExists('evento_clientes');
    }
}
