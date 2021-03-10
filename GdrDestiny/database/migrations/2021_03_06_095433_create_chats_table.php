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
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->foreignId('id_topmap')->nullable();
            $table->foreignId('id_middlemap')->nullable();
            $table->foreignId('id_bottommap')->nullable();
            $table->text('descrizione');
            $table->enum('visibility',['yes','no']);

            $table->foreign('id_topmap')->references('id')->on('topmaps')->onDelete('cascade');
            $table->foreign('id_middlemap')->references('id')->on('middlemaps')->onDelete('cascade');
            $table->foreign('id_bottommap')->references('id')->on('bottommaps')->onDelete('cascade');

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
