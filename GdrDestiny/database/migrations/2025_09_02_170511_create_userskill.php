<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserskillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userskills', function (Blueprint $table) {
            $table->id();
            $table->integer('livello');
            $table->foreignId('id_user');
            $table->foreignId('id_skill');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_skill')->references('id')->on('skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userskill');
    }
}
