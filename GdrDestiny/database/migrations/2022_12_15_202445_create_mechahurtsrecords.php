<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechahurtsrecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechahurtsrecords', function (Blueprint $table) {
            $enumPartsMecha=\Config::get('mecha.partsOfMecha');

            $table->id();
            $table->integer('hurt');
            $table->string('descrizione');
            $table->foreignId('id_user'); 
            $table->foreignId('id_usermecha');
            $table->enum('partOfMecha', $enumPartsMecha);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_usermecha')->references('id')->on('usermechas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mechahurtsrecord');
    }
}
