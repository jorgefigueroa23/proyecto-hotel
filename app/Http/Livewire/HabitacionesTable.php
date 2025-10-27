<?php

namespace App\Http\Livewire;

use App\Models\Habitacion;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HabitacionesExport;

class HabitacionesTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setRefreshKeepAlive()
            ->setHideReorderColumnUnlessReorderingEnabled()
            ->setRememberColumnSelectionDisabled()
            ->setSecondaryHeaderTrAttributes(fn($rows) => ['class' => 'bg-blue-100'])
            ->setFooterTrAttributes(fn($rows) => ['class' => 'bg-blue-100'])
            ->setUseHeaderAsFooterEnabled()
            ->setHideBulkActionsWhenEmptyEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->searchable(),

            Column::make('N° Habitación', 'numero')
                ->sortable()
                ->searchable(),

            Column::make('Tipo', 'tipo')
                ->sortable()
                ->searchable(),

            Column::make('Precio (S/)', 'precio')
                ->sortable()
                ->format(fn($value) => number_format($value, 2)),

            Column::make('Descripción', 'descripcion')
                ->sortable()
                ->searchable(),

            Column::make('Estado', 'estado')
                ->sortable()
                ->format(function ($value) {
                    return match ($value) {
                        'disponible' => '<span class="badge bg-success">Disponible</span>',
                        'ocupada' => '<span class="badge bg-warning">Ocupada</span>',
                        'mantenimiento' => '<span class="badge bg-danger">Mantenimiento</span>',
                        default => $value,
                    };
                })
                ->html(),

            ButtonGroupColumn::make('Acciones')->buttons([
                LinkColumn::make('Edit')
                    ->title(fn($row) => 'Editar')
                    ->location(fn($row) => 'javascript:void(0);')
                    ->attributes(fn($row) => [
                        'wire:click' => "\$emit('editHabitacion', {$row->id})",
                        'class' => 'btn btn-warning',
                    ])
                    ->html(fn() => '<i class="fa fa-edit"></i>'),

                LinkColumn::make('Delete')
                    ->title(fn($row) => $row->estado === 'mantenimiento' ? 'Habilitar' : 'Mantenimiento')
                    ->location(fn($row) => 'javascript:void(0);')
                    ->attributes(function ($row) {
                        if ($row->estado === 'mantenimiento') {
                            return [
                                'wire:click' => "\$emit('enableHabitacion', {$row->id})",
                                'class' => 'btn btn-info',
                            ];
                        } else {
                            return [
                                'wire:click' => "\$emit('deleteHabitacion', {$row->id})",
                                'class' => 'btn btn-danger',
                            ];
                        }
                    })
                    ->html(fn($row) => $row->estado === 'mantenimiento'
                        ? '<i class="fa fa-check"></i>'
                        : '<i class="fa fa-tools"></i>'
                    ),
            ]),
        ];
    }

    public function builder(): Builder
    {
        return Habitacion::query()
            ->when($this->columnSearch['numero'] ?? null, fn($query, $numero) =>
                $query->where('habitacions.numero', 'like', "%{$numero}%")
            )
            ->when($this->columnSearch['tipo'] ?? null, fn($query, $tipo) =>
                $query->where('habitacions.tipo', 'like', "%{$tipo}%")
            );
    }

    public function bulkActions(): array
    {
        return [
            'export' => 'Exportar',
        ];
    }

    public function export()
    {
        $habitaciones = $this->getSelected();
        $this->clearSelected();
        return Excel::download(new HabitacionesExport($habitaciones), 'habitaciones.xlsx');
    }
}