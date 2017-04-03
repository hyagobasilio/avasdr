<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('curso_materias', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('curso_id');
        $table->unsignedInteger('materia_id');

        $table->foreign('curso_id')
        ->references('id')->on('cursos');

        $table->foreign('materia_id')
        ->references('id')->on('materias');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('curso_materias');
    }
}
