<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('gestores')->insert([
            'name' => 'Hyago Gestor',
            'email' => 'admin@avasdr.com.br',
            'password' => Hash::make('123456')
        ]);

        DB::table('docentes')->insert([
            'name' => 'Hyago Docente',
            'email' => 'admin@avasdr.com.br',
            'password' => Hash::make('123456')
        ]);

        DB::table('alunos')->insert([
            'name' => 'Hyago Aluno',
            'email' => 'admin@avasdr.com.br',
            'password' => Hash::make('123456')
        ]);
        
    }
}
