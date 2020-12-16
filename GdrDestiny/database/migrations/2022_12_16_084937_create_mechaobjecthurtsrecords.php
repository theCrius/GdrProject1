<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechaobjecthurtsrecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechaobjecthurtsrecords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mechaobject');
            $table->integer('hurt');
            $table->foreignId('id_user');
            $table->string('descrizione');
            $table->timestamps();

            $table->foreign('id_mechaobject')->references('id')->on('mechaobjects')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mechaobjecthurtsrecords');
    }
}
