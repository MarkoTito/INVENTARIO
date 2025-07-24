<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tiposeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Tipos= [
            [
                'T_Descriocion' => 'Licencia',
                'N_estado'=> 1
            ],
            [
                'T_Descriocion' => 'Monitor',
                'N_estado'=> 1
            ],
            [
                'T_Descriocion' => 'CPU',
                'N_estado'=> 1
            ],
            [
                'T_Descriocion' => 'Mouse',
                'N_estado'=> 1
            ],
            [
                'T_Descriocion' => 'Proyector',
                'N_estado'=> 1
            ],
            [
                'T_Descriocion' => 'Impresora',
                'N_estado'=> 1
            ],
        ];

        foreach ($Tipos as $tipo) {
            Tipo::create($tipo);
        }
    }
}
