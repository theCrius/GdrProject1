<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void  n
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
        $table->foreignId('id_user_to');
        $table->foreignId('id_user_from');
        $table->text('message');
        $table->string('title');
        $table->enum('letto',['si','no']);
        $table->timestamps();

        $table->foreign('id_user_to')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('id_user_from')->references('id')->on('users')->onDelete('cascade');

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
