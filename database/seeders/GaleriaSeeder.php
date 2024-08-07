<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('galeria')->insert([
            [
                'titulo' => 'Imagen 1',
                'descripcion' => 'Descripción de la imagen 1',
                'image_path' => 'galeria/image1.png',
                'cancha_id' => 1, // Asegúrate de que exista una cancha con ID 1
                'user_id' => 1, // Asegúrate de que exista un usuario con ID 1
            ],
            [
                'titulo' => 'Imagen 2',
                'descripcion' => 'Descripción de la imagen 2',
                'image_path' => 'galeria/image2.jpg',
                'cancha_id' => 1, // Asegúrate de que exista una cancha con ID 1
                'user_id' => 1, // Asegúrate de que exista un usuario con ID 1
            ],
            [
                'titulo' => 'Imagen 3',
                'descripcion' => 'Descripción de la imagen 3',
                'image_path' => 'galeria/image3.jpg',
                'cancha_id' => 2, // Asegúrate de que exista una cancha con ID 2
                'user_id' => 1, // Asegúrate de que exista un usuario con ID 1
            ],
            [
                'titulo' => 'Imagen 4',
                'descripcion' => 'Descripción de la imagen 4',
                'image_path' => 'galeria/image4.jpg',
                'cancha_id' => 2, // Asegúrate de que exista una cancha con ID 2
                'user_id' => 1, // Asegúrate de que exista un usuario con ID 1
            ],
            [
                'titulo' => 'Imagen 5',
                'descripcion' => 'Descripción de la imagen 5',
                'image_path' => 'galeria/image5.jpeg',
                'cancha_id' => 3, // Asegúrate de que exista una cancha con ID 3
                'user_id' => 2, // Asegúrate de que exista un usuario con ID 2
            ],
            [
                'titulo' => 'Imagen 6',
                'descripcion' => 'Descripción de la imagen 6',
                'image_path' => 'galeria/image6.jpg',
                'cancha_id' => 3, // Asegúrate de que exista una cancha con ID 3
                'user_id' => 2, // Asegúrate de que exista un usuario con ID 2
            ],
            [
                'titulo' => 'Imagen 7',
                'descripcion' => 'Descripción de la imagen 7',
                'image_path' => 'galeria/image7.jpg',
                'cancha_id' => 4, // Asegúrate de que exista una cancha con ID 4
                'user_id' => 2, // Asegúrate de que exista un usuario con ID 2
            ],
            [
                'titulo' => 'Imagen 8',
                'descripcion' => 'Descripción de la imagen 8',
                'image_path' => 'galeria/image8.jpeg',
                'cancha_id' => 4, // Asegúrate de que exista una cancha con ID 4
                'user_id' => 2, // Asegúrate de que exista un usuario con ID 2
            ],
            [
                'titulo' => 'Imagen 9',
                'descripcion' => 'Descripción de la imagen 9',
                'image_path' => 'galeria/image9.jpg',
                'cancha_id' => 5, // Asegúrate de que exista una cancha con ID 5
                'user_id' => 1, // Asegúrate de que exista un usuario con ID 3
            ],
            [
                'titulo' => 'Imagen 10',
                'descripcion' => 'Descripción de la imagen 10',
                'image_path' => 'galeria/image10.jpg',
                'cancha_id' => 5, // Asegúrate de que exista una cancha con ID 5
                'user_id' => 1, // Asegúrate de que exista un usuario con ID 3
            ],
        ]);
    }
}
