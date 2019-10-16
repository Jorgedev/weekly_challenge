<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jorge Miguel T. de Oliveira',
            'email' => 'jorgemiguelto@gmail.com',
            'password' => bcrypt('mudar123'),
        ]);
    }
}
