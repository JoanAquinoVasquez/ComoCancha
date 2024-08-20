<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            EmpresaSeeder::class,
            UserSeeder::class,
            DepartamentoSeeder::class,
            ProvinciaSeeder::class,
            DistritoSeeder::class,
            DeporteSeeder::class,
            SedeSeeder::class,
            CanchaSeeder::class,
            ReservaSeeder::class,
            PagoSeeder::class,
            GaleriaSeeder::class,
            HorarioSeeder::class,
            PrecioSeeder::class,
        ]);
    }
}
