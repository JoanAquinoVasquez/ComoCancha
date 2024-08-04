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
                'nombre' => 'Sede Principal',
                'telefono' => 123456789,
                'email' => 'principal@sede.com',
                'direccion' => 'Av. Principal 789',
                'distrito_id' => 1
            ],
            [
                'nombre' => 'Sede Secundaria',
                'telefono' => 987654321,
                'email' => 'secundaria@sede.com',
                'direccion' => 'Av. Secundaria 123',
                'distrito_id' => 2
            ],
            // Agrega más sedes y relaciona con el ID del distrito correspondiente
        ]);
    }
}