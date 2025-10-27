<?php

namespace App\Exports;

use App\Models\Obras_adicionales;
use Maatwebsite\Excel\Concerns\FromCollection;

class ServicesExport implements FromCollection
{
    public $services;
    public function __construct($services) {
        $this->services = $services;
    }

    public function collection()
    {
        return Obras_adicionales::whereIn('id', $this->services)->get();
    }
}
