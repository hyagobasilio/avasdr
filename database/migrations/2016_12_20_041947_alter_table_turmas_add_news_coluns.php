<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTurmasAddNewsColuns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('turnos', function(Blueprint $table){
        $table->increments('id');
        $table->string('nome');
      });
      Schema::table('turmas', function (Blueprint $table) {
            $table->unsignedInteger('turno_id');
            $table->unsignedInteger('estagio_educacional');

            $table->foreign('turno_id')->references('id')->on('turnos');

            $table->foreign('estagio_educacional')
                ->references('id')->on('estagios_educacionais');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('turnos');
        Schema::table('turmas', function (Blueprint $table) {
            $table->dropColumn(['turno_id', 'estagio_educacional']);
        });
    }
}
