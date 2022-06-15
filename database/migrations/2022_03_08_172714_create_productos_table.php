<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('name');
            $table->enum('estado',['activo','inactivo'])->default('activo');
            $table->string('photourl')->nullable();
            // $table->string('sku');
            // $table->string('serial');
            // $table->date('fecha_de_compra');
            // $table->string('comprado_de');
            // $table->text('descripcion');
            // $table->unsignedBigInteger('rma_id')->unsigned()->nullable();//relacion
            // $table->foreign('rma_id')->references('id')->on('rmas'); //clave foranea
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
        Schema::dropIfExists('productos');
    }
}
