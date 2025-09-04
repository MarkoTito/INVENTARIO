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
                'Nubicacion_sede' => 1
            ],
            [
                'UK_Nombre_sede' => 'Maitacapa',
                'Nubicacion_sede' => 2
            ],
            [
                'UK_Nombre_sede' => 'Nuevo san martin',
                'Nubicacion_sede' => 2
            ],
            [
                'UK_Nombre_sede' => 'Infantas',
                'Nubicacion_sede' => 2
            ],
            [
                'UK_Nombre_sede' => 'Narangal',
                'Nubicacion_sede' => 2
            ],
            [
                'UK_Nombre_sede' => 'Pedregal',
                'Nubicacion_sede' => 2
            ],
            [
                'UK_Nombre_sede' => 'ONPE',
                'Nubicacion_sede' => 2
            ],
        ];

        foreach ($sedes as $sede) {
            Sedes::create($sede);
        }

    }
}
