<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechaobjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechaobjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usermecha');
            $table->foreignId('id_sellingmechaobject');

            $table->foreign('id_usermecha')->references('id')->on('usermechas');
            $table->foreign('id_sellingmechaobject')->references('id')->on('sellingmechaobjects');
            
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
        Schema::dropIfExists('mechaobjects');
    }
}
