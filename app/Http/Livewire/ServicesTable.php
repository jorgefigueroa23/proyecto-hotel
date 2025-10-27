<?php

namespace App\Http\Livewire;

use App\Models\Obras_adicionales;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ServicesTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setRefreshKeepAlive();
    }

    public function columns(): array
    {
        return [
            Column::make('Descripcion', 'descripcion')
                ->searchable()
                ->sortable(),
            Column::make('Resolucion', 'resolucion')
                ->searchable()
                ->sortable(),
            Column::make('Monto', 'monto')
                ->searchable()
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return Obras_adicionales::query();
    }
}
