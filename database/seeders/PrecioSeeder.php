<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('precio')->insert([
            [
                'amount' => 100.00,
                'cancha_id' => 1, // Asegúrate de que exista una cancha con ID 1
            ],
            [
                'amount' => 150.00,
                'cancha_id' => 2, // Asegúrate de que exista una cancha con ID 2
            ],
            [
                'amount' => 200.00,
                'cancha_id' => 3, // Asegúrate de que exista una cancha con ID 3
            ],
        ]);
    }
}
