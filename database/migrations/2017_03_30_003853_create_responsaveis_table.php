<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsaveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('responsaveis', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nome');
        $table->string('cpf');
        $table->string('rg');
        $table->date('data_nascimento');
        $table->string('email');
        $table->enum('sexo',['f','m']);
        $table->string('telefone1');
        $table->string('telefone2');
        $table->string('endereco');
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
        Schema::drop('responsaveis');
    }
}
