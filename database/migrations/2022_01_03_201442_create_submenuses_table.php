<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenuses', function (Blueprint $table) {
            $table->increments('sm_id');
            $table->integer('men_id');
            $table->string('sm_nombre');
            $table->string('sm_descripcion');
            $table->float('sm_precio');
            $table->integer('sm_cantidadPromedio');
            $table->string('sm_estado');
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
        Schema::dropIfExists('submenuses');
    }
}
