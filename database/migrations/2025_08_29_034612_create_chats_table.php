<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('chats', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');   // usu
        $table->unsignedBigInteger('doctor_id'); // doc
        $table->timestamp('last_message_at')->nullable();
        $table->timestamps();

        $table->index(['user_id']);
        $table->index(['doctor_id']);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
