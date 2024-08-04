<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagoSeeder extends Seeder
{
    public function run()
    {
        DB::table('pago')->insert([
            [
                'monto' => 50.00,
                'fecha' => '2024-08-10',
                'metodo' => 'Tarjeta de Crédito',
                'estado' => true,
                'reserva_id' => 3
            ],
            [
                'monto' => 30.00,
                'fecha' => '2024-08-11',
                'metodo' => 'Efectivo',
                'estado' => true,
                'reserva_id' => 4
            ],
            // Agrega más pagos y relaciona con el ID de la reserva correspondiente
        ]);
    }
}