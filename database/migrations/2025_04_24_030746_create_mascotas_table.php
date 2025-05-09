<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('edad');
            $table->string('especie');
            $table->string('raza');
            $table->string('sexo');
            $table->string('color');
            $table->float('peso');
            $table->text('alergias')->nullable();
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('user_id');  // Relación con la tabla 'users'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relación con 'users'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
