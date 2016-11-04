<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('enlaces', function (Blueprint $table) {
            $table->increments('idenlace');
            $table->string('nombreenlace');
            $table->string('institucion');            
            $table->string('telefono');
            $table->string('email');
            $table->string('tipo');
            $table->integer('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('idunidad')->on('unidads');
            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('idcargo')->on('cargos');
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
        Schema::drop('enlaces');
    }
}
