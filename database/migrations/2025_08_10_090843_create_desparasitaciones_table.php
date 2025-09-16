<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesparasitacionesTable extends Migration
{
    public function up()
    {
        Schema::create('desparasitaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mascota_id');
            $table->date('fecha_dosis');
            $table->string('producto');
            $table->enum('externo_interno', ['Externo', 'Interno']);
            $table->date('proxima_dosis')->nullable();
            $table->timestamps();

            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('desparasitaciones');
    }
}
