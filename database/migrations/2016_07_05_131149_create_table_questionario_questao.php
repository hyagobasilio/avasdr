<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuestionarioQuestao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionario_questao', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('questao_id')->unsigned();
            $table->foreign('questao_id')->references('id')
                    ->on('questoes')
                    ->onDelete('cascade');
            $table->integer('questionario_id')->unsigned();
            $table->foreign('questionario_id')->references('id')
                    ->on('questionarios')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questionario_questao');
    }
}
