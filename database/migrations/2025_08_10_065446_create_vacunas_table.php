<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacunacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mascota_3');
            $table->date('Fecha_dosis');
            $table->string('nom_vacuna');
            $table->date('Proxima_dosis')->nullable();
            $table->timestamps();

            // Llave foránea
            $table->foreign('id_mascota_3')->references('id')->on('mascotas')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacunas');
    }
}
