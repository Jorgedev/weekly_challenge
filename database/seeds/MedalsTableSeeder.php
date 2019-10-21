<?php

use Illuminate\Database\Seeder;

class MedalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medals')->insert([
            'name' => 'Novato',
							'description' => 'Conquista por ter criado a conta',
            'icon' => 'user-alt',
        ]);
					DB::table('medals')->insert([
            'name' => 'Boa sorte',
							'description' => 'Conquista por ter criado um objetivo',
            'icon' => 'user-alt',
        ]);
    }
}
