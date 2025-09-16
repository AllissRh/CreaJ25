<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('v_citas', function (Blueprint $table) {
            $table->id(); // id de la cita

            // Llaves foráneas
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('mascota_id');

            // Campos de la cita
            $table->date('fecha');
            $table->time('hora');
            $table->text('motivo')->nullable();
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada'])->default('pendiente');

            $table->timestamps();

            // Relaciones
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_citas');
    }
};
