<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seccions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo')->nullable();
            $table->text('descripcion')->nullable();
            $table->boolean('estado')->default(1); // 1 = activo, 0 = inactivo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seccions');
    }
};