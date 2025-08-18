<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class bienExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $bienes;

    public function __construct($bienes)
    {
        $this->bienes = $bienes;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->bienes->map(function ($bienes){
            return [
                $bienes->tipo->Tdescriocion_tipo,
                $bienes->UK_Hardware_Codigo,
                $bienes->Tdescripcion_hardware,
                $bienes->area->UK_Nombre_area,
                $bienes->Testado_fisico_hardware,
                $bienes->Dadquisicion_hardware,
                $bienes->Dbaja_hardware,
                $bienes->estado->UK_Descripcion_estado,
                
            ];
        });
    }



    public function headings (): array{
        return [
            'Tipo',
            'Codigo',
            'Descripcion',
            'Area',
            'Estado Fisico',
            'Fecha de adquiscion',
            'Fecha de Baja',
            'Activo/Baja'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
                1 =>[
                    'font' => [
                        'bold' => true,
                    ],
                    'fill' =>[
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor'=>[
                            'argb' => 'FFCCCCCC'
                        ]

                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                    ]
                ]
        ];
    }
}
