<?php

namespace Database\Seeders;

use App\Models\Sedes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sedes= [
            [
                'UK_Nombre_sede' => 'Palacio municipal',
                'Tubicacion_sede' => 'Adentro'
            ],
            [
                'UK_Nombre_sede' => 'Maitacapa',
                'Tubicacion_sede' => 'Afuera'
            ],
            [
                'UK_Nombre_sede' => 'Nuevo san martin',
                'Tubicacion_sede' => 'Afuera'
            ],
            [
                'UK_Nombre_sede' => 'Infantas',
                'Tubicacion_sede' => 'Afuera'
            ],
            [
                'UK_Nombre_sede' => 'Narangal',
                'Tubicacion_sede' => 'Afuera'
            ],
            [
                'UK_Nombre_sede' => 'Pedregal',
                'Tubicacion_sede' => 'Afuera'
            ],
            [
                'UK_Nombre_sede' => 'ONPE',
                'Tubicacion_sede' => 'Afuera'
            ],
        ];

        foreach ($sedes as $sede) {
            Sedes::create($sede);
        }

    }
}
