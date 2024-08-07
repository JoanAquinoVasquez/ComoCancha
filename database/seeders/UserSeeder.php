<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $clienteRole = Role::create(['name' => 'Cliente']);
        $duenoRole = Role::create(['name' => 'Dueño']);
        $adminRole = Role::create(['name' => 'Administrador']);

        $dueno = User::create([
            'name' => 'Walther Galan',
            'email' => 'walther@example.com',
            'password' => bcrypt('walther'),
        ]
        );
        $admin = User::create([
            'name' => 'Joan Aquino',
            'email' => 'joan@example.com',
            'password' => bcrypt('joan'),
        ]
        );
        $cliente = User::create([
            'name' => 'Efrain Calle',
            'email' => 'calle@example.com',
            'password' => bcrypt('calle'),
        ]
        );

        $cliente->assignRole($clienteRole);
        $dueno->assignRole($duenoRole);
        $admin->assignRole($adminRole);
    }
}
