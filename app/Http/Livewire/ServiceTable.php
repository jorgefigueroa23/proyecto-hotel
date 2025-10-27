<?php

namespace App\Http\Livewire;

use App\Models\Obras_adicionales;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\{DateFilter, MultiSelectFilter, SelectFilter};
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServicesExport;

class ServiceTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setRefreshKeepAlive()
            ->setHideReorderColumnUnlessReorderingEnabled()
            /* ->setFilterLayoutSlideDown() */
            ->setRememberColumnSelectionDisabled()
            ->setSecondaryHeaderTrAttributes(function($rows) {
                return ['class' => 'bg-blue-100'];
            })
            ->setSecondaryHeaderTdAttributes(function(Column $column, $rows) {
                if ($column->isField('id')) {
                    return ['class' => 'text-red-500'];
                }
                return ['default' => true];
            })
            ->setFooterTrAttributes(function($rows) {
                return ['class' => 'bg-blue-100'];
            })
            ->setFooterTdAttributes(function(Column $column, $rows) {
                if ($column->isField('name')) {
                    return ['class' => 'text-green-500'];
                }
                return ['default' => true];
            })
            ->setUseHeaderAsFooterEnabled()
            ->setHideBulkActionsWhenEmptyEnabled();
    }

    public function columns(): array
    {
        return [
            /* ImageColumn::make('Avatar')
                ->location(function($row) {
                    return asset('img/logo-'.$row->id.'.png');
                })
                ->attributes(function($row) {
                    return [
                        'class' => 'w-8 h-8 rounded-full',
                    ];
                }), */
                /* Column::make('Order', 'sort')
                ->sortable()
                ->searchable(), */
            Column::make('N°', 'id')
                ->searchable()
                ->sortable(),
            Column::make('Descripción', 'descripcion')
                ->searchable()
                ->sortable(),
            Column::make('Precio', 'monto')
                ->searchable()
                ->sortable(),
            Column::make('Resolición', 'resolucion')
                ->searchable()
                ->sortable(),
            LinkColumn::make('Acciones')
                ->title(fn($row) => 'Editar')
                ->location(fn($row) => 'javascript:void(0);')
                ->attributes(function($row) {
                    return [
                        'wire:click' => "\$emit('editService', {$row->id})",
                        'class' => 'btn btn-warning',
                    ];
                })
                ->html(fn($row) => '<i class="fa fa-edit"></i>'),
        ];
    }

    public function builder(): Builder
    {
        return Obras_adicionales::query()
            ->when($this->columnSearch['descripcion'] ?? null, fn ($query, $descripcion) => $query->where('obras_adicionales.descripcion', 'like', '%' . $descripcion . '%'))
            ->when($this->columnSearch['monto'] ?? null, fn ($query, $monto) => $query->where('obras_adicionales.monto', 'like', '%' . $monto . '%'));
    }

    public function bulkActions(): array
    {
        return [
            /* 'activate' => 'Activate',
            'deactivate' => 'Deactivate', */
            'export' => 'Export',
        ];
    }

    public function export()
    {
        $services = $this->getSelected();
        $this->clearSelected();
        return Excel::download(new ServicesExport($services), 'services.xlsx');
    }
}
