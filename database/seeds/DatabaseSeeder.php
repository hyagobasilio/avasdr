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
            'email' => 'gestor@avasdr.com.br',
            'password' => Hash::make('123456')
        ]);
        
    }
}
