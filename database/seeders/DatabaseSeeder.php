<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
<<<<<<< HEAD

        $users = [
            [
                'name' => 'Joan Aquino Vasquez',
                'email' => 'jaquinov@unprg.edu.pe',
                'password' => bcrypt('jaquinov'),
            ],
            [
                'name' => 'Walter Galan Vite',
                'email' => 'wgalanv@unprg.edu.pe',
                'password' => bcrypt('wgalanv'),
            ],
            [
                'name' => 'Efrain Calle Chambe',
                'email' => 'ecallec@unprg.edu.pe',
                'password' => bcrypt('ecallec'),
            ],

            // Añadir más usuarios según sea necesario
        ];

        foreach ($users as $user) {
            User::create($user);
        }
=======
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
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
    }
}
