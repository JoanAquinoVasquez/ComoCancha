<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Asegúrate de importar la clase User

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

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
    }
}
