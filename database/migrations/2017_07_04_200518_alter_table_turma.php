<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTurma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('turmas', function(Blueprint $table) {
            $table->time('hora_inicio');            
            $table->time('hora_fim');            
            $table->unsignedInteger('serie_id');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turmas', function(Blueprint $table) {
            $table->dropColumn('hora_inicio');            
            $table->dropColumn('hora_fim');            
            $table->dropColumn('serie_id');            
        });
    }
}
