<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->foreignId('id_user_to');
        $table->foreignId('id_user_from');
        $table->text('message');
        $table->string('title');
        $table->timestamps();

        $table->foreign('id_user_to')->references('id')->on('users');
        $table->foreign('id_user_from')->references('id')->on('users');


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
