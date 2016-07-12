<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuestionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->date('vigencia');
            $table->integer('turma_id')->unsigned();
            $table->foreign('turma_id')->references('id')
                    ->on('turmas')
                    ->onDelete('cascade');
            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')
                    ->on('docentes')
                    ->onDelete('cascade');
            $table->integer('qtd_questoes');
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
        Schema::drop('questionarios');
    }
}
