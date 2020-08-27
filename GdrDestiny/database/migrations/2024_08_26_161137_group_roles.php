<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GroupRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grouproles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_ongroup');
            $table->string('name');
            $table->string('immagine');
            $table->timestamps();

            $table->foreign('id_ongroup')->references('id')->on('groups');
            
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
