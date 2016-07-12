<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMateriaTurma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_turma', function(Blueprint $table){
            $table->increments('id');
            $table->integer('materia_id')->unsigned();
            $table->foreign('materia_id')->references('id')->on('materias')
                    ->onDelete('cascade');
            $table->integer('turma_id')->unsigned();
            $table->foreign('turma_id')->references('id')->on('turmas')
                    ->onDelete('cascade');
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
        Schema::drop('materia_turma');
    }
}
