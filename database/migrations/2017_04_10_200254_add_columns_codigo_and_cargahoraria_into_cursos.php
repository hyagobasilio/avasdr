<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsCodigoAndCargahorariaIntoCursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cursos', function(Blueprint $table) {
        $table->string('codigo');
        $table->unsignedInteger('carga_horaria');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('cursos', function(Blueprint $table) {
        $table->dropColumn('codigo', 'carga_horaria');
      });
    }
}
