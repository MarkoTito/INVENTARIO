<?php

namespace Database\Seeders;

use App\Models\Modelo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $modelos= [
            [
                'Tdescripcion_modelo' => 'No cuenta con una modelos',
            ],
            
           
            
        ];

        foreach ($modelos as $modelo) {
            Modelo::create($modelo);
        }
    }
}
