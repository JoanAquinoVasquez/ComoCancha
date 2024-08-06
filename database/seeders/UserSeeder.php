<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $clienteRole = Role::create(['name' => 'cliente']);
        $duenoRole = Role::create(['name' => 'dueño']);
        $adminRole = Role::create(['name' => 'administrador']);

        $dueno = User::create([
            'name' => 'walther',
            'email' => 'walther@example.com',
            'password' => bcrypt('walther'),
        ]
        );
        $admin = User::create([
            'name' => 'joan',
            'email' => 'joan@example.com',
            'password' => bcrypt('joan'),
        ]
        );
        $cliente = User::create([
            'name' => 'calle',
            'email' => 'calle@example.com',
            'password' => bcrypt('calle'),
        ]
        );

        $cliente->assignRole($clienteRole);
        $dueno->assignRole($duenoRole);
        $admin->assignRole($adminRole);
    }
}
