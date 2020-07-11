<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Exps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('exp_dati');
            $table->foreignId('id_user_to');
            $table->foreignId('id_user_from');
            $table->string('motivazione');
            
            $table->foreign('id_user_to')->references('id')->on('users');
            $table->foreign('id_user_from')->references('id')->on('users');
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
