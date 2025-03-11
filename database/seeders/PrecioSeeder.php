<?php

namespace Database\Seeders;

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
            // Cancha 1
            ['amount' => 60.00, 'cancha_id' => 1, 'turno' => 'mañana'],
            ['amount' => 80.00, 'cancha_id' => 1, 'turno' => 'noche'],

            // Cancha 2
            ['amount' => 100.00, 'cancha_id' => 2, 'turno' => 'mañana'],
            ['amount' => 120.00, 'cancha_id' => 2, 'turno' => 'noche'],

            // Cancha 3
            ['amount' => 50.00, 'cancha_id' => 3, 'turno' => 'mañana'],
            ['amount' => 70.00, 'cancha_id' => 3, 'turno' => 'noche'],

            // Cancha 4
            ['amount' => 100.00, 'cancha_id' => 4, 'turno' => 'mañana'],
            ['amount' => 130.00, 'cancha_id' => 4, 'turno' => 'noche'],

            // Cancha 5
            ['amount' => 60.00, 'cancha_id' => 5, 'turno' => 'mañana'],
            ['amount' => 90.00, 'cancha_id' => 5, 'turno' => 'noche'],
        ]);
    }
}
