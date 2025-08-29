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
                'Tdescriocion_tipo' => 'Licencia',
            ],
            [
                'Tdescriocion_tipo' => 'Todo tipos',
            ],
            [
                'Tdescriocion_tipo' => 'Laptop',
            ],
            [
                'Tdescriocion_tipo' => 'Monitor',
            ],
            [
                'Tdescriocion_tipo' => 'CPU',
            ],
            [
                'Tdescriocion_tipo' => 'Mouse',
            ],
            [
                'Tdescriocion_tipo' => 'Proyector',
            ],
            [
                'Tdescriocion_tipo' => 'Impresora',
            ],
        ];

        foreach ($Tipos as $tipo) {
            Tipo::create($tipo);
        }
    }
}
