<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('habitacions', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 10)->unique();
            $table->enum('tipo', ['simple', 'doble', 'suite']);
            $table->decimal('precio', 10, 2);
            $table->enum('estado', ['disponible', 'ocupada', 'mantenimiento'])->default('disponible');
            $table->text('descripcion')->nullable();

            // 🔹 Relación con seccions
            $table->unsignedBigInteger('seccion_id')->nullable();
            $table->foreign('seccion_id')
                ->references('id')
                ->on('seccions')
                ->onDelete('set null');

            // 🔹 Fechas de creación y actualización
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('habitacions');
    }
};