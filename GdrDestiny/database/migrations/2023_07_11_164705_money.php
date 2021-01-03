<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Money extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneys', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('motivo');
            $table->integer('soldi');
            $table->foreignId('id_user_from');
            $table->foreignId('id_user_to');
            
            $table->foreign('id_user_from')->references('id')->on('users');
            $table->foreign('id_user_to')->references('id')->on('users');
            
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
        //
    }
}
