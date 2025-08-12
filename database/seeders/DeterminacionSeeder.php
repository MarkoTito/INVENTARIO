<?php

namespace Database\Seeders;

use App\Models\Determinacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeterminacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados= [
            [
                'Tdescripcion_determinacion' => 'Determinado',
            ],
            [
                'Tdescripcion_determinacion' => 'Indeterminado',
            ]
        ];

        foreach ($estados as $esta) {
            Determinacion::create($esta);
        }
    }
}
