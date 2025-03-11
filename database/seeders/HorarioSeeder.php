<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('horario')->insert([
            // Horarios para ShowGol (Cancha ID: 1)
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
                'hora_fin' => '20:00:00',
                'cancha_id' => 1,
                'user_id' => 3
            ],
            [
                'dia' => 'Miercoles',
                'hora_inicio' => '10:00:00',
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
                'hora_fin' => '16:00:00',
                'cancha_id' => 1,
                'user_id' => 3
            ],

            // Horarios para MachoGol (Cancha ID: 2)
            [
                'dia' => 'Lunes',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '19:00:00',
                'cancha_id' => 2,
                'user_id' => 3
            ],
            [
                'dia' => 'Martes',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 2,
                'user_id' => 3
            ],
            [
                'dia' => 'Miercoles',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 2,
                'user_id' => 3
            ],
            [
                'dia' => 'Jueves',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '20:00:00',
                'cancha_id' => 2,
                'user_id' => 3
            ],
            [
                'dia' => 'Viernes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 2,
                'user_id' => 3
            ],

            // Horarios para Camp Nou (Cancha ID: 3)
            [
                'dia' => 'Lunes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '17:00:00',
                'cancha_id' => 3,
                'user_id' => 4
            ],
            [
                'dia' => 'Martes',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 3,
                'user_id' => 4
            ],
            [
                'dia' => 'Miercoles',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '19:00:00',
                'cancha_id' => 3,
                'user_id' => 4
            ],
            [
                'dia' => 'Jueves',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 3,
                'user_id' => 4
            ],
            [
                'dia' => 'Viernes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '17:00:00',
                'cancha_id' => 3,
                'user_id' => 4
            ],

            // Horarios para Boston Celtics (Cancha ID: 4)
            [
                'dia' => 'Lunes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '20:00:00',
                'cancha_id' => 4,
                'user_id' => 4
            ],
            [
                'dia' => 'Martes',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '19:00:00',
                'cancha_id' => 4,
                'user_id' => 4
            ],
            [
                'dia' => 'Miercoles',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 4,
                'user_id' => 4
            ],
            [
                'dia' => 'Jueves',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '20:00:00',
                'cancha_id' => 4,
                'user_id' => 4
            ],
            [
                'dia' => 'Viernes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '19:00:00',
                'cancha_id' => 4,
                'user_id' => 4
            ],

            // Horarios para Ball Arena (Cancha ID: 5)
            [
                'dia' => 'Lunes',
                'hora_inicio' => '07:00:00',
                'hora_fin' => '15:00:00',
                'cancha_id' => 5,
                'user_id' => 5
            ],
            [
                'dia' => 'Martes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '17:00:00',
                'cancha_id' => 5,
                'user_id' => 5
            ],
            [
                'dia' => 'Miercoles',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 5,
                'user_id' => 5
            ],
            [
                'dia' => 'Jueves',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '17:00:00',
                'cancha_id' => 5,
                'user_id' => 5
            ],
            [
                'dia' => 'Viernes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '16:00:00',
                'cancha_id' => 5,
                'user_id' => 5
            ],
            [
                'dia' => 'Sabado',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '15:00:00',
                'cancha_id' => 1,
                'user_id' => 3
            ],
            [
                'dia' => 'Sabado',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '16:00:00',
                'cancha_id' => 2,
                'user_id' => 3
            ],
            [
                'dia' => 'Sabado',
                'hora_inicio' => '11:00:00',
                'hora_fin' => '17:00:00',
                'cancha_id' => 3,
                'user_id' => 4
            ],
            [
                'dia' => 'Sabado',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '14:00:00',
                'cancha_id' => 4,
                'user_id' => 4
            ],
            [
                'dia' => 'Sabado',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '13:00:00',
                'cancha_id' => 5,
                'user_id' => 5
            ],
            // Horarios para domingos
            [
                'dia' => 'Domingo',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '14:00:00',
                'cancha_id' => 1,
                'user_id' => 3
            ],
            [
                'dia' => 'Domingo',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '13:00:00',
                'cancha_id' => 2,
                'user_id' => 3
            ],
            [
                'dia' => 'Domingo',
                'hora_inicio' => '12:00:00',
                'hora_fin' => '18:00:00',
                'cancha_id' => 3,
                'user_id' => 4
            ],
            [
                'dia' => 'Domingo',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '12:00:00',
                'cancha_id' => 4,
                'user_id' => 4
            ],
            [
                'dia' => 'Domingo',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '15:00:00',
                'cancha_id' => 5,
                'user_id' => 5
            ],
        ]);
    }
}
