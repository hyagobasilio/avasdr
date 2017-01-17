<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEscolaEstagioEducacional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('escolas_estagio_educacional', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('escola_id');
          $table->unsignedInteger('estagio_educacional');

          $table->foreign('escola_id')
              ->references('id')->on('escolas');

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
        Schema::drop('escolas_estagio_educacional');
    }
}
