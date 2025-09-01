<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marca= [
            [
                'UK_Nombre_marca' => 'No cuenta con una marca',
            ],
            [
                'UK_Nombre_marca' => 'Compatible',
            ],
            [
                'UK_Nombre_marca' => 'HP',
            ],
             [
                'UK_Nombre_marca' => 'Epson',
            ],
            [
                'UK_Nombre_marca' => 'Dell',
            ],
            [
                'UK_Nombre_marca' => 'Lenovo',
            ],
            [
                'UK_Nombre_marca' => 'Acer',
            ],
            [
                'UK_Nombre_marca' => 'Asus',
            ],
            [
                'UK_Nombre_marca' => 'Logitech',
            ],
            [
                'UK_Nombre_marca' => 'Razer',
            ],
           
            
        ];

        foreach ($marca as $mar) {
            Marca::create($mar);
        }
    }
}
