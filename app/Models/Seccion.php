<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $table = 'seccions';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];

    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class);
    }
}