<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medicalrecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalrecords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_user_from');
            $table->foreignId('id_user_to');
            $table->enum('hurtposition',['top','bottom','middle','sanitamentale']);
            $table->string('descrizione');
            $table->integer('danno');
            
            $table->foreign('id_user_from')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user_to')->references('id')->on('users')->onDelete('cascade');

            
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
