<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuestoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('capacidade',3);
            $table->string('elemento_competencia',3);
            $table->string('obj_conhecimento',3);
            $table->enum('dificuldade',['F','M','D']);
            $table->integer('alternativa_id');
            $table->string('questao',255);
            $table->string('comando',3);
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')
                    ->on('cursos');
            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')
                    ->on('docentes');
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
        Schema::drop('questoes');
    }
}
