<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserobjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userobjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreignId('id_sellingobject');
            $table->enum('equipped',['yes','no'])->default('no');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->ondelete('cascade');
            $table->foreign('id_sellingobject')->references('id')->on('sellingobjects')->ondelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_objects');
    }
}
