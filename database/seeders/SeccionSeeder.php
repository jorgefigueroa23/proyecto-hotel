<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seccion;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $secciones = [
            ['nombre' => 'Primer Piso', 'descripcion' => 'Habitaciones del primer nivel', 'estado' => 1],
            ['nombre' => 'Segundo Piso', 'descripcion' => 'Habitaciones del segundo nivel', 'estado' => 1],
            ['nombre' => 'Tercer Piso', 'descripcion' => 'Habitaciones del tercer nivel', 'estado' => 1],
            ['nombre' => 'Zona VIP', 'descripcion' => 'Área exclusiva de suites premium', 'estado' => 1],
        ];

        foreach ($secciones as $seccion) {
            Seccion::create($seccion);
        }
    }
}