<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjecthurtsrecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objecthurtsrecords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_object');
            $table->integer('hurt');
            $table->foreignId('id_user');
            $table->string('descrizione');
            $table->timestamps();

            $table->foreign('id_object')->references('id')->on('userobjects')->onDelete('cascade');
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
        Schema::dropIfExists('object_hurts');
    }
}
