<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Crear permisos
        $manageAdmin = Permission::create(['name' => 'Administrador']);
        $manageClients = Permission::create(['name' => 'Cliente']);
        $manageDueño = Permission::create(['name' => 'Dueño']);
        // Crear roles
        $clienteRole = Role::create(['name' => 'Cliente']);
        $duenoRole = Role::create(['name' => 'Dueño']);
        $adminRole = Role::create(['name' => 'Administrador']);

        $adminRole->givePermissionTo([
            $manageAdmin,
        ]);

        $duenoRole->givePermissionTo([
            $manageDueño,
        ]);

        $clienteRole->givePermissionTo([
            $manageClients,
        ]);

        $dueno1 = User::create([
            'name' => 'Walther Galan',
            'email' => 'walther@example.com',
            'password' => bcrypt('walther'),
            'empresa_id' => 1,

        ]);

        $dueno2 = User::create([
            'name' => 'Martin Ampuero',
            'email' => 'martin@example.com',
            'password' => bcrypt('martin'),
            'empresa_id' => 2,

        ]);

        $admin1 = User::create([
            'name' => 'Joan Aquino',
            'email' => 'joan@example.com',
            'password' => bcrypt('joan'),
            'empresa_id' => 1,
        ]);

        $admin2 = User::create([
            'name' => 'Mauricio Esquivez',
            'email' => 'mau@example.com',
            'password' => bcrypt('mau'),
            'empresa_id' => 1,
        ]);

        $admin3 = User::create([
            'name' => 'Rick Sanchez',
            'email' => 'rick@example.com',
            'password' => bcrypt('rick'),
            'empresa_id' => 2,
        ]);

        $admin4 = User::create([
            'name' => 'Homero Simpson',
            'email' => 'homero@example.com',
            'password' => bcrypt('homero'),
            'empresa_id' => 2,
        ]);

        $cliente1 = User::create([
            'name' => 'Efrain Calle',
            'email' => 'calle@example.com',
            'password' => bcrypt('calle'),
            'empresa_id' => null,
        ]);

        $cliente1->assignRole($clienteRole);
        $dueno1->assignRole($duenoRole);
        $dueno2->assignRole($duenoRole);
        $admin1->assignRole($adminRole);
        $admin2->assignRole($adminRole);
        $admin3->assignRole($adminRole);
        $admin4->assignRole($adminRole);
    }
}
