<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
           // DepartamentoSeeder::class,
            DeporteSeeder::class,
           // ProvinciaSeeder::class,
            //DistritoSeeder::class,
            CanchaSeeder::class,
            SedeSeeder::class,
            ReservaSeeder::class,
            PagoSeeder::class,
            HorarioSeeder::class,
            
        ]);
    }
}
