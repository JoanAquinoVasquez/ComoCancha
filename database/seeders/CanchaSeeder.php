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
                'tipo' => 'ShowGol',
                'direccion' => 'Av. Grau 123',
                'descripcion' => 'Cancha de fútbol profesional con césped artificial',
                'deporte_id' => 1,
                'sede_id' => 1,
                'user_id' => 1,
                'estado' => 0
            ],
            [
                'tipo' => 'MachoGol',
                'direccion' => 'Av. Los Pinos 456',
                'descripcion' => 'Cancha de fútbol con césped natural',
                'deporte_id' => 1,
                'sede_id' => 2,
                'user_id' => 1,
                'estado' => 0
            ],
            [
                'tipo' => 'Camp Nou',
                'direccion' => 'Av. Las Flores 789',
                'descripcion' => 'Cancha de fútbol con césped artificial',
                'deporte_id' => 1,
                'sede_id' => 3,
                'user_id' => 2,
                'estado' => 0
            ],
            [
                'tipo' => 'Boston Celtics',
                'direccion' => 'Av. Los Pinos 456',
                'descripcion' => 'Cancha de baloncesto techada',
                'deporte_id' => 2,
                'sede_id' => 4,
                'user_id' => 2,
                'estado' => 0
            ],
            [
                'tipo' => 'Ball Arena',
                'direccion' => 'Av. Las Flores 789',
                'descripcion' => 'Cancha de voleibol con arena',
                'deporte_id' => 3,
                'sede_id' => 2,
                'user_id' => 1,
                'estado' => 0
            ]
        ]);
    }
}