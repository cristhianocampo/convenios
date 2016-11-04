<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('institucions', function (Blueprint $table) {
            $table->increments('idinstitucion');
            $table->string('nombreinstitucion');
            $table->string('tipo');
            $table->string('existencia');
            $table->string('plantafisica');
            $table->string('nestudiantes');
            $table->string('ndocentes');
            $table->string('carreras');
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
        Schema::drop('institucions');
    }
}
