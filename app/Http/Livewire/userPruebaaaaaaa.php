<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;

class UsersTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
        /* ->setReorderEnabled()
        ->setSingleSortingDisabled()
        ->setHideReorderColumnUnlessReorderingEnabled()
        ->setFilterLayoutSlideDown()
        ->setRememberColumnSelectionDisabled()
        ->setSecondaryHeaderTrAttributes(function($rows) {
            return ['class' => 'bg-gray-100'];
        })
        ->setSecondaryHeaderTdAttributes(function(Column $column, $rows) {
            if ($column->isField('id')) {
                return ['class' => 'text-red-500'];
            }
            return ['default' => true];
        })
        ->setFooterTrAttributes(function($rows) {
            return ['class' => 'bg-gray-100'];
        })
        ->setFooterTdAttributes(function(Column $column, $rows) {
            if ($column->isField('name')) {
                return ['class' => 'text-green-500'];
            }
            return ['default' => true];
        })
        ->setUseHeaderAsFooterEnabled()
        ->setHideBulkActionsWhenEmptyEnabled() */;
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
            /* Column::make('Order', 'id')
                ->sortable()
                ->collapseOnMobile()
                ->excludeFromColumnSelect(), */
            Column::make('ID', 'id')
                ->sortable()
                /* ->setSortingPillTitle('Key') */
                /* ->setSortingPillDirections('0-9', '9-0') */
                ->secondaryHeader(function($rows) {
                    return $rows->sum('id');
                })
                ->html(),
            Column::make('Nombre', 'name')
                ->searchable()
                ->collapseOnMobile()
                /* ->collapseOnTablet() */
                ->sortable(),
            Column::make('Username', 'username')
                ->searchable()
                ->sortable()
                ->collapseOnMobile()
                /* ->collapseOnTablet() */,
            Column::make('Numdoc', 'numdoc')
                ->searchable()
                ->sortable()
                ->collapseOnMobile()
                /* ->collapseOnTablet() */,
            Column::make('Email', 'email')
                ->searchable()
                ->collapseOnMobile()
                ->sortable(),
                /* ->collapseOnMobile(), */
            Column::make('Rol', 'rol')
                ->searchable()
                ->sortable()
                /* ->collapseOnTablet() */,
            Column::make('Estado', 'estado')
                ->searchable()
                ->collapseOnMobile()
                ->sortable()
                /* ->collapseOnTablet() */,

        ];
    }

    public function builder(): Builder
    {
        return User::query();
    }

}