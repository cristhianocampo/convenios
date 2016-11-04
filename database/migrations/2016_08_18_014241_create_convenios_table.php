<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->increments('idconvenio');
            $table->string('nombreconve');
            $table->string('tipoconve');
            $table->string('objetivo');
            $table->string('procedencia');
            $table->string('fechafirma');
            $table->string('fi');
            $table->string('ff');
            $table->string('frenovacion');            
            $table->string('pais');
            $table->string('descripcion');
            $table->string('comentario');
            $table->string('archivo');

            $table->integer('enlace_id')->unsigned();
            $table->foreign('enlace_id')->references('idenlace')->on('enlaces');

            $table->string('enlaceext');            

            $table->integer('institucion_id')->unsigned();
            $table->foreign('institucion_id')->references('idinstitucion')->on('institucions');

            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('idestado')->on('estados');

            $table->string('beneficioscp');
            $table->string('beneficioslp');
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
        Schema::drop('convenios');
    }
}
