<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedeSeeder extends Seeder
{
    public function run()
    {
        DB::table('sede')->insert([
            [
                'nombre' => 'Sede La Victoria',
                'telefono' => 123456789,
                'email' => 'slavictoria@example.com',
                'direccion' => 'Av. Grau 123',
                'distrito_id' => 1,
                'user_id' => 3
            ],
            [
                'nombre' => 'Sede San Isidro',
                'telefono' => 987654321,
                'email' => 'sani@example.com',
                'direccion' => 'Av. Los Pinos 456',
                'distrito_id' => 2,
                'user_id' => 3
            ],
            [
                'nombre' => 'Sede Miraflores',
                'telefono' => 456789123,
                'email' => 'smiraflores@example.com',
                'direccion' => 'Av. Las Flores 789',
                'distrito_id' => 3,
                'user_id' => 3
            ],
            [
                'nombre' => 'Sede Surco',
                'telefono' => 789123456,
                'email' => 'ssurco@example.com',
                'direccion' => 'Av. Los Álamos 101',
                'distrito_id' => 4,
                'user_id' => 4
            ],
            
            // Agrega más sedes y relaciona con el ID del distrito correspondiente
        ]);
    }
}