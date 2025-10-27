<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $table = 'habitacions';

    protected $fillable = [
        'numero',
        'tipo',
        'precio',
        'estado',
        'descripcion',
        'seccion_id',
    ];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }
}