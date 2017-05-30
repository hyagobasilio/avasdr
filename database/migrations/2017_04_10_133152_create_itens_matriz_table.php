<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensMatrizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('matriz_itens', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('matriz_id')->unsigned();
        $table->foreign('matriz_id')->references('id')->on('matriz');
        $table->integer('materia_id')->unsigned();
        $table->foreign('materia_id')->references('id')->on('materias');
        $table->integer('carga_horaria')->unsigned();
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
        Schema::drop('matriz_itens');
    }
}
