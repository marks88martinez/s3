<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rmas', function (Blueprint $table) {
            $table->id();
            // $table->string('codigo_rma');

            $table->string('sku')->nullable();
            $table->string('serial')->nullable();
            $table->string('num_lote')->nullable();
            // $table->date('fecha_de_compra');
            $table->date('fecha')->nullable();
            $table->string('comprado_de')->nullable();
            $table->text('descripcion')->nullable();




            $table->enum('estado',['verificado','no_verificado'])->default('no_verificado');

            $table->unsignedBigInteger('empresa_id')->unsigned()->nullable(); //relacion
            $table->foreign('empresa_id')->references('id')->on('empresas'); //clave foranea

            // $table->unsignedBigInteger('responsable_id'); //relacion
            // $table->foreign('responsable_id')->references('id')->on('responsables'); //clave foranea

            $table->unsignedBigInteger('user_id')->unsigned()->nullable(); //relacion
            $table->foreign('user_id')->references('id')->on('users'); //clave foranea


            $table->unsignedBigInteger('direccion_id')->unsigned()->nullable(); //relacion
            $table->foreign('direccion_id')->references('id')->on('direcciones'); //clave foranea

            // $table->unsignedBigInteger('envio_id')->unsigned()->nullable(); //relacion
            // $table->foreign('envio_id')->references('id')->on('direcciones'); //clave foranea
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
        Schema::dropIfExists('rmas');
    }
}
