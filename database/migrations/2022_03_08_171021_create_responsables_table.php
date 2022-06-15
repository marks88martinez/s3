<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('responsables', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nombre');
        //     $table->string('linea_baja');
        //     $table->string('celular');
        //     $table->string('email');
        //     $table->unsignedBigInteger('empresa_id'); //relacion
        //     $table->foreign('empresa_id')->references('id')->on('empresas'); //clave foranea
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsables');
    }
}
