<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCursoIntoMatrizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('matriz', function(Blueprint $table) {
        $table->integer('curso_id')->unsigned();
        $table->foreign('curso_id')->references('id')->on('cursos');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('matriz', function(Blueprint $table) {
        $table->dropForeign('matriz_curso_id_foreign');
        $table->dropColumn('curso_id');
      });
    }
}
