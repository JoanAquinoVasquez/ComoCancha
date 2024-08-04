<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanchaSeeder extends Seeder
{
    public function run()
    {
        DB::table('cancha')->insert([
            [
                'tipo' => 'Fútbol',
                'ubicacion' => 'Av. Grau 123',
                'precioporhora' => 50.00,
                'descripcion' => 'Cancha de fútbol profesional',
                'user_id' => 1,
                'deporte_id' => 1
            ],
            [
                'tipo' => 'Basketball',
                'ubicacion' => 'Av. Los Pinos 456',
                'precioporhora' => 30.00,
                'descripcion' => 'Cancha de basketball con aros de última generación',
                'user_id' => 3,
                'deporte_id' => 2
            ],
            // Agrega más canchas y relaciona con el ID del cliente y deporte correspondiente
        ]);
    }
}