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
        Schema::table('turmas', function (Blueprint $table) {
            $table->integer('ano');
            $table->enum('turno', ['manha', 'tarde','noite']);
            $table->integer('estagio_educacional'); 
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
        //
    }
}
