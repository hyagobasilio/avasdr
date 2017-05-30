<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnEstagioEducacionalFromCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cursos', function(Blueprint $table) {
        $table->dropColumn('estagio_educacional');
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
        $table->integer('estagio_educacional')->unsigned()->nullable();
      });
    }
}
