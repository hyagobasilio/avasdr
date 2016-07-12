<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRespostas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questao_id')->unsigned();
            $table->foreign('questao_id')->references('id')
                    ->on('questoes');
            
            $table->integer('questionario_id')->unsigned();
            $table->foreign('questionario_id')->references('id')
                    ->on('questionarios')
                    ->onDelete('cascade');
            
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')
                    ->on('alunos')
                    ->onDelete('cascade');
            
            $table->integer('resposta')->unsigned();
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
        Schema::drop('respostas');
    }
}
