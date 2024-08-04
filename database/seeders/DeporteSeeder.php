<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeporteSeeder extends Seeder
{
    public function run()
    {
        DB::table('deporte')->insert([
            ['nombre' => 'Fútbol', 'descripcion' => 'Deporte de equipo jugado con un balón en un campo rectangular.'],
            ['nombre' => 'Basketball', 'descripcion' => 'Deporte de equipo jugado con una pelota y un aro.'],
            ['nombre' => 'Voleibol', 'descripcion' => 'Deporte de equipo jugado con una pelota en una red.'],
            // Agrega más deportes según sea necesario
        ]);
    }
}