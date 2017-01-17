<?php

use Illuminate\Database\Seeder;

class TurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('turnos')->insert([
        ['nome' => 'Manhã'],
        ['nome' => 'Tarde'],
        ['nome' => 'Noite'],
      ]);
    }
}
