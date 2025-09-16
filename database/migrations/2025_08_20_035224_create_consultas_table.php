<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id(); // Id de la consulta
            $table->unsignedBigInteger('id_mascota');

            $table->date('fecha');

            $table->string('motivo')->nullable();
            $table->text('anamnesico')->nullable();
            $table->string('estado_reproductivo')->nullable();
            $table->string('alimentacion')->nullable();
            $table->text('diagnostico')->nullable();

            $table->timestamps();

            // Llave foránea con la tabla mascotas
            $table->foreign('id_mascota')
                  ->references('id')
                  ->on('mascotas')
                  ->onDelete('cascade'); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
}

