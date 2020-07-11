<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mechas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('costo');
            $table->integer('salute');
            $table->integer('velocità');
            $table->integer('potenza');
            $table->integer('stazza');
            $table->string('immagine');
            
            
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
