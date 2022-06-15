<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_lugar');
            $table->string('codigo_postal');
            $table->string('pais');
            $table->string('ciudad');
            $table->string('calle');

            $table->unsignedBigInteger('user_id')->unsigned()->nullable(); //relacion
            $table->foreign('user_id')->references('id')->on('users'); //clave foranea

            $table->unsignedBigInteger('empresa_id')->unsigned()->nullable(); ; //relacion
            $table->foreign('empresa_id')->references('id')->on('empresas'); //clave foranea
            $table->softDeletes();
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
        Schema::dropIfExists('direcciones');
    }
}
