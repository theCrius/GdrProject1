<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Userclasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userclasses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_classe');
            $table->foreignId('id_user');
            $table->timestamps();

            $table->foreign('id_classe')->references('id')->on('classes');
            $table->foreign('id_user')->references('id')->on('users');
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
