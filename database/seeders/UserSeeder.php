<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'walther',
                'email' => 'walther@example.com',
                'password' => bcrypt('walther'),
            ],
            [
                'name' => 'joan',
                'email' => 'joan@example.com',
                'password' => bcrypt('joan'),
            ]
        ]);
    }
}
