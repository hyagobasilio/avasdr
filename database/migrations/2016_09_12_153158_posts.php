<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('materia_id')->unsigned()->nullable();
            $table->foreign('materia_id')->references('id')
                    ->on('materias')
                    ->onDelete('cascade');

            $table->integer('docente_id')->unsigned()->nullable();
            $table->foreign('docente_id')->references('id')
                    ->on('docentes')
                    ->onDelete('cascade');

            $table->integer('turma_id')->unsigned()->nullable();
            $table->foreign('turma_id')->references('id')
                    ->on('turmas')
                    ->onDelete('cascade');

            $table->string('titulo');
            $table->text('texto');
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
        Schema::drop('posts');
    }
}
