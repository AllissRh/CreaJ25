<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id(); // 
            $table->foreignId('mascota_id')->constrained('mascotas')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK usuario (dueño o doctor)
            $table->date('fecha'); // fecha de la cita
            $table->time('hora'); // hora de la cita
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada','reagendar', 'finalizada'])->default('pendiente'); // estado
            $table->string('motivo')->nullable(); // motivo de la cita
            $table->text('comentario')->nullable(); // comentario adicional
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
