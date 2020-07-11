<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ghosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ghosts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('descrizione');
            $table->string('skin');
            $table->foreignId('id_user');        
            $table->string('slot1');
            $table->string('slot2');
            $table->string('slot3');
            $table->string('slot4');
            $table->string('slot5');
            $table->timestamps();
            
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
