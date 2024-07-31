<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

            // Añadir más usuarios según sea necesario
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
