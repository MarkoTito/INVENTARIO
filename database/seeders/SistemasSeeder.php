<?php

namespace Database\Seeders;

use App\Models\Sistema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SistemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Sistemas= [
            [
                'T_Descripcion_Sis' => 'Zoon',
                'T_Estado_Sis'=> "Activo"
            ],
            [
                'T_Descripcion_Sis' => 'Ezet',
                'T_Estado_Sis'=> "Activo"
            ],
            [
                'T_Descripcion_Sis' => 'Micrasoft ',
                'T_Estado_Sis'=> "Activo"
            ],
            [
                'T_Descripcion_Sis' => 'autocad',
                'T_Estado_Sis'=> "Activo"
            ]
        ];

        foreach ($Sistemas as $sis) {
            Sistema::create($sis);
        }
    }
}
