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
                'hora_fin' => '12:00:00',
                'estado' => 1,
                'user_id' => 1,
                'cancha_id' => 5
            ],
            [
                'fecha_reserva' => '2024-08-11',
                'hora_inicio' => '14:00:00',
                'hora_fin' => '16:00:00',
                'estado' => 0,
                'user_id' => 3,
                'cancha_id' => 6
            ],
            // Agrega más reservas y relaciona con el ID del cliente y cancha correspondiente
        ]);
    }
}