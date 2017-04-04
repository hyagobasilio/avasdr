<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjusteEstagioEducacionalCursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cursos', function (Blueprint $table) {
        $table->unsignedInteger('estagio_educacional')->nullable()->change();
        $table->dropForeign('cursos_estagio_educacional_foreign');
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
