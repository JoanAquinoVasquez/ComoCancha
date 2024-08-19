<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder{
    public function run(){
        DB::table('empresa')->insert([
            [
                'nombre' => 'Walther S.A',
            ],
            [
                'nombre' => 'Ampuero S.A',
            ],
        ]);
    }

}