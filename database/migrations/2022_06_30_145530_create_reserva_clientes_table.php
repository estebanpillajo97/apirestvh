<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_clientes', function (Blueprint $table) {
            $table->increments('rc_id');
            $table->integer('res_id');
            $table->string('rc_nombreCliente');
            $table->string('rc_cedula');
            $table->integer('tc_id');
            $table->string('rc_celular');
            $table->integer('np_id');
            $table->date('rc_fecha');
            $table->time('rc_hora');
            $table->string('rc_descripcion');
            $table->string('rc_estado');
            $table->string('rc_tipoCedula');
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
        Schema::dropIfExists('reserva_clientes');
    }
}
