<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('id_user')->nullable();
            $table->timestamp('started');
            $table->timestamp('finished')->nullable();
            $table->foreignId('id_chat');
            
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
            $table->foreign('id_chat')->references('id')->on('chats')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quests');
    }
}
