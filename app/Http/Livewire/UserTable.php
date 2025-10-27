<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\{DateFilter, MultiSelectFilter, SelectFilter};
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;


class UserTable extends DataTableComponent
{
    public $contador = 0;
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setRefreshKeepAlive()
            /* ->setRefreshMethod('refresh') */
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
            Column::make('N°', 'id')
                ->sortable()
                ->setSortingPillTitle('Key')
                ->setSortingPillDirections('0-9', '9-0')
                ->format(function ($value) {
                    return $value - 1; // Resta 1 al valor original del ID
                })
                ->excludeFromColumnSelect(),
            /* Column::make('#')
                ->label(fn () => ++$this->contador) 
                ->excludeFromColumnSelect(), */
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
            /* Column::make('Rol', 'rol')
                ->searchable()
                ->sortable() */
            Column::make('Rol', 'rol')
                ->searchable()
                ->sortable()
                ->format(function($value) {
                    $labelClass = '';
                    switch ($value) {
                        case 'admin':
                            $labelClass = 'label label-admin';
                            $tipo = 'Administrador';
                            break;
                        case 'user':
                            $labelClass = 'label label-user';
                            $tipo = 'Usuario';
                            break;
                        // Agrega más casos según tus roles
                        default:
                            $labelClass = 'label label-default';
                            break;
                    }
                    return "<span class=\"{$labelClass}\">{$tipo}</span>";
                })
                ->html()
                /* ->collapseOnTablet() */,
            BooleanColumn::make('Estado', 'estado')
                ->searchable()
                ->collapseOnMobile()
                ->sortable(),
            ButtonGroupColumn::make('Acciones')
                ->buttons([
                LinkColumn::make('Edit')
                    ->title(fn($row) => 'Editar')
                    ->location(fn($row) => 'javascript:void(0);')
                    ->attributes(function($row) {
                        return [
                            'wire:click' => "\$emit('editUser', {$row->id})",
                            'class' => 'btn btn-warning',
                        ];
                    })
                    ->html(fn($row) => '<i class="fa fa-edit"></i>'),
                    LinkColumn::make('Delete')
                    ->title(fn($row) => $row->estado == 0 ? 'Habilitar' : 'Inhabilitar')
                    ->location(fn($row) => 'javascript:void(0);')
                    ->attributes(function($row) {
                        if ($row->estado == 0) {
                            return [
                                'wire:click' => "\$emit('enableUser', {$row->id})",
                                'class' => 'btn btn-info',
                            ];
                        } else {
                            return [
                                'wire:click' => "\$emit('deleteUser', {$row->id})",
                                'class' => 'btn btn-danger',
                            ];
                        }
                    })
                    ->html(function($row) {
                        if ($row->estado == 0) {
                            return '<i class="fa fa-undo"></i>';
                        } else {
                            return '<i class="fa fa-trash"></i>';
                        }
                    }),
                ])
        ];     
    }

    public function refresh()
    {
        
    }


    /* public function filters(): array
    {
        return [
            MultiSelectFilter::make('Tags')
                ->options(
                    User::query()
                        ->orderBy('name')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($user) => $user->name)
                        ->toArray()
                )->filter(function(Builder $builder, array $values) {
                    $builder->whereHas('tags', fn($query) => $query->whereIn('tags.id', $values));
                })
                ->setFilterPillValues([
                    '3' => 'Tag 1',
                ]),
            SelectFilter::make('E-mail Verified', 'email_verified_at')
                ->setFilterPillTitle('Verified')
                ->options([
                    ''    => 'Any',
                    'yes' => 'Yes',
                    'no'  => 'No',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === 'yes') {
                        $builder->whereNotNull('email_verified_at');
                    } elseif ($value === 'no') {
                        $builder->whereNull('email_verified_at');
                    }
                }),
            SelectFilter::make('Active')
                ->setFilterPillTitle('User Status')
                ->setFilterPillValues([
                    '1' => 'Active',
                    '0' => 'Inactive',
                ])
                ->options([
                    '' => 'All',
                    '1' => 'Yes',
                    '0' => 'No',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('active', true);
                    } elseif ($value === '0') {
                        $builder->where('active', false);
                    }
                }),
            DateFilter::make('Verified From')
                ->config([
                    'min' => '2020-01-01',
                    'max' => '2021-12-31',
                ])
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('email_verified_at', '>=', $value);
                }),
            DateFilter::make('Verified To')
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('email_verified_at', '<=', $value);
                }),
        ];
    } */

    /* public function builder(): Builder
    {
        return User::query();
    } */
    public function builder(): Builder
    {
        return User::query()
            ->where('rol', '!=', 'root')
            ->when($this->columnSearch['name'] ?? null, fn ($query, $name) => $query->where('users.name', 'like', '%' . $name . '%'))
            ->when($this->columnSearch['email'] ?? null, fn ($query, $email) => $query->where('users.email', 'like', '%' . $email . '%'));
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
        $users = $this->getSelected();
        $this->clearSelected();
        return Excel::download(new UsersExport($users), 'users.xlsx');
    }

    /* public function activate()
    {
        User::whereIn('id', $this->getSelected())->update(['active' => true]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        User::whereIn('id', $this->getSelected())->update(['active' => false]);

        $this->clearSelected();
    } */

}
