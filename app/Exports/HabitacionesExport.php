<?php

namespace App\Exports;

use App\Models\Habitacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HabitacionesExport implements FromCollection, WithHeadings
{
    protected $habitaciones;

    public function __construct($habitaciones = null)
    {
        $this->habitaciones = $habitaciones;
    }

    public function collection()
    {
        return Habitacion::whereIn('id', $this->habitaciones)->get([
            'id',
            'numero',
            'tipo',
            'precio',
            'estado',
            'descripcion'
        ]);
    }

    public function headings(): array
    {
        return ['ID', 'Número', 'Tipo', 'Precio', 'Estado', 'Descripción'];
    }
}