<?php

use Illuminate\Database\Seeder;

class EstagiosEducacionaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estagios_educacionais')->insert([
         	['nome' => 'Creche'],
         	['nome' => 'Pré-Escola'],
         	['nome' => '1º Ano Ensino Fundamental'],
         	['nome' => '2º Ano Ensino Fundamental'],
         	['nome' => '3º Ano Ensino Fundamental'],
         	['nome' => '4º Ano Ensino Fundamental'],
         	['nome' => '5º Ano Ensino Fundamental'],
         	['nome' => '6º Ano Ensino Fundamental'],
         	['nome' => '7º Ano Ensino Fundamental'],
         	['nome' => '8º Ano Ensino Fundamental'],
         	['nome' => '9º Ano Ensino Fundamental'],
         	['nome' => '1º Ano Ensino Médio'],
         	['nome' => '2º Ano Ensino Médio'],
         	['nome' => '3º Ano Ensino Médio'],


     	]
     	);
    }
}
