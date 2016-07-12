<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDocenteIdIntoQuestaotemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questoes_temp', function (Blueprint $table) {
            $table->integer('docente_id')->unsigned()->nullable();
        });
        Schema::table('questoes_temp', function (Blueprint $table) {
            $table->foreign('docente_id')->references('id')
                    ->on('docentes')
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
        Schema::dropColumn('docente_id');
    }
}
