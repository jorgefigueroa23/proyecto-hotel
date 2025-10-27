<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traslados extends Model
{
    use HasFactory;
    protected $table = 'traslados';
    protected $fillable = [
        'cementerio',
        'tipo_traslado',
        'acta_defuncion_traslado',
        'nombre_pabellon_traslado',
        'nombre_pabellon_anterior_traslado',
        'ubicacion_anterior_traslado',
        'ubicacion_pabellon_traslado',
    ];
}
