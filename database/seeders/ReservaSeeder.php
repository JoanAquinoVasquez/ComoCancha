<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservaSeeder extends Seeder
{
    public function run()
    {
        DB::table('reserva')->insert([
            [
                'fecha_reserva' => '2024-08-10',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '11:00:00',
                'estado' => 1,
                'user_id' => 7,
                'cancha_id' => 4
            ],
            [
                'fecha_reserva' => '2024-08-11',
                'hora_inicio' => '14:00:00',
                'hora_fin' => '15:00:00',
                'estado' => 0,
                'user_id' => 7,
                'cancha_id' => 1
            ],
            [
                'fecha_reserva' => '2024-08-12',
                'hora_inicio' => '18:00:00',
                'hora_fin' => '19:00:00',
                'estado' => 1,
                'user_id' => 7,
                'cancha_id' => 3
            ],
            [
                'fecha_reserva' => '2024-08-13',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '09:00:00',
                'estado' => 0,
                'user_id' => 7,
                'cancha_id' => 2
            ],
            // Agrega más reservas y relaciona con el ID del cliente y cancha correspondiente
        ]);
    }
}