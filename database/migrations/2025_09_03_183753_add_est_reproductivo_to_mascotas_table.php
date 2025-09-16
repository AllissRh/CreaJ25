<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstReproductivoToMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void 
    {
        Schema::table('mascotas', function (Blueprint $table) {
        $table->string('est_reproductivo')->default('Desconocido');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
         Schema::table('mascotas', function (Blueprint $table) {
        $table->dropColumn('est_reproductivo');
    });
    }
}
