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
                'cancha_id' => 1,
                'user_id' => 3
            ],
            [
                'dia' => 'Martes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 1,
                'user_id' => 3
            ],
            [
                'dia' => 'Miércoles',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 1,
                'user_id' => 3
            ],
            [
                'dia' => 'Jueves',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 1,
                'user_id' => 3
            ],
            [
                'dia' => 'Viernes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 1,
                'user_id' => 3
            ],
            [
                'dia' => 'Lunes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 2,
                'user_id' => 3
            ],
            // Agrega más horarios y relaciona con el ID de la cancha correspondiente
        ]);
    }
}