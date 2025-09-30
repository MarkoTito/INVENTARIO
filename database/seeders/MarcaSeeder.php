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
            [
                'UK_Nombre_marca' => 'All-in-One ANTRYX ASUS',
            ],
            [
                'UK_Nombre_marca' => 'AVASTAC',
            ],
            [
                'UK_Nombre_marca' => 'CYBERTEL',
            ],
            [
                'UK_Nombre_marca' => 'Dell Inc.',
            ],
            [
                'UK_Nombre_marca' => 'EXIN',
            ],
            [
                'UK_Nombre_marca' => 'Foxconn GAMBYTE',
            ],
            [
                'UK_Nombre_marca' => 'HALION',
            ],
            [
                'UK_Nombre_marca' => 'INTEL',
            ],
            [
                'UK_Nombre_marca' => 'LG',
            ],
            [
                'UK_Nombre_marca' => 'MICRONICS',
            ],
            [
                'UK_Nombre_marca' => 'TEROS',
            ],
            [
                'UK_Nombre_marca' => 'THERMALTAKE',
            ],
            [
                'UK_Nombre_marca' => 'VASTEC',
            ],
            [
                'UK_Nombre_marca' => 'XTECH',
            ],
           
            
        ];

        foreach ($marca as $mar) {
            Marca::create($mar);
        }
    }
}
