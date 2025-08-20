<?php

namespace App\Livewire\Admin\Datatable;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Bien;

class ExportacionTable extends DataTableComponent
{
    protected $model = Bien::class;

    public function configure(): void
    {
        $this->setPrimaryKey('PK_Hardware');
    }

    public function columns(): array
    {
        return [
            Column::make("Area", "area.UK_Nombre_area")
                ->searchable()
                ->sortable(),
            Column::make("Tipo", "tipo.Tdescriocion_tipo")
                ->searchable()
                ->sortable(),
            Column::make("Codigo", "UK_Hardware_Codigo")
                ->searchable()
                ->sortable(),
            Column::make("Fehca de Adquisicion", "Dadquisicion_hardware")
                ->sortable(),
            Column::make("Estado", "Testado_fisico_hardware")
                ->sortable(),
            Column::make('Acciones')
            ->label(function ($row) {
                return '<a href="'.route('adminprueba.busqueda', ['PK_Hardware' => $row->PK_Hardware]).'" class="btn btn-sm btn-primary">Editar</a>';
            })
            ->html()
            
        ];
    }
}
