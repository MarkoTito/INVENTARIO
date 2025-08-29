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
                'Tdescripcion_sistema' => 'Todos sistemas',
            ],
            [
                'Tdescripcion_sistema' => 'Zoom',
            ],
            [
                'Tdescripcion_sistema' => 'Eset',
            ],
            [
                'Tdescripcion_sistema' => 'Microsoft',
            ],
            [
                'Tdescripcion_sistema' => 'autocad',
            ]
        ];

        foreach ($Sistemas as $sis) {
            Sistema::create($sis);
        }
    }
}
