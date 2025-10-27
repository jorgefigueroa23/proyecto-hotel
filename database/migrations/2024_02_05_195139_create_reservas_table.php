<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('id_habitacion')->constrained('habitacions')->onDelete('cascade');
            $table->timestamp('fecha_reserva')->useCurrent();
            $table->date('fecha_checkin');
            $table->date('fecha_checkout');
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada', 'finalizada'])->default('pendiente');
            $table->decimal('total', 10, 2)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};