<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Actions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_user')->nullable();
            $table->text('text_sent');
            $table->enum('typology',array_keys(\Config::get('gdrConsts.chat.symbols')));
            $table->foreignId('id_chat');
            $table->foreignId('id_quest')->nullable();
            $table->foreignId('id_user_receive')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
            $table->foreign('id_user_receive')->references('id')->on('users')->onDelete('set null');
            $table->foreign('id_chat')->references('id')->on('chats')->onDelete('cascade');
            $table->foreign('id_quest')->references('id')->on('quests')->onDelete(('cascade'));

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
