<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsIntoAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alunos', function(Blueprint $table){
          $table->date('data_nascimento');
          $table->string('rg', 11)->nullable();
          $table->string('endereco');
           $table->integer('pai_id')->unsigned()->nullable();
           $table->integer('mae_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alunos', function(Blueprint $table) {
          $table->dropColumn(['data_nascimento', 'rg', 'endereco']);
        });
    }
}
