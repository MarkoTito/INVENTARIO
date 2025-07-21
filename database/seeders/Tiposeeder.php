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
                'descripcion' => 'Licencia',
                'estado'=> 1
            ],
            [
                'descripcion' => 'Monitor',
                'estado'=> 1
            ],
            [
                'descripcion' => 'CPU',
                'estado'=> 1
            ],
            [
                'descripcion' => 'Mouse',
                'estado'=> 1
            ],
            [
                'descripcion' => 'Proyector',
                'estado'=> 1
            ],
            [
                'descripcion' => 'Impresora',
                'estado'=> 1
            ],
        ];

        foreach ($Tipos as $tipo) {
            Tipo::create($tipo);
        }
    }
}
