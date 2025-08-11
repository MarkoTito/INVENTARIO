<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $estados= [
            [
                'UK_Descripcion_estado' => 'Activo',
            ],
            [
                'UK_Descripcion_estado' => 'Baja',
            ]
        ];

        foreach ($estados as $esta) {
            Estado::create($esta);
        }
    }
}
