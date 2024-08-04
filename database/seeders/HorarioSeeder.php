<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('horario')->insert([
            [
                'dia' => 'Lunes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 5
            ],
            [
                'dia' => 'Martes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 6
            ],
            // Agrega más horarios y relaciona con el ID de la cancha correspondiente
        ]);
    }
}