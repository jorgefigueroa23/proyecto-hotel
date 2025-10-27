<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto', 100);
            $table->enum('categoria', ['limpieza', 'minibar', 'ropa de cama', 'otros'])->default('otros');
            $table->integer('cantidad')->default(0);
            $table->string('unidad', 20)->default('unidad');
            $table->timestamp('fecha_actualizacion')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};