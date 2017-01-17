<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cursos', function (Blueprint $table) {

          $table->unsignedInteger('estagio_educacional');
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
      Schema::table('cursos', function (Blueprint $table) {
          $table->dropColumn(['estagio_educacional']);
      });
    }
}
