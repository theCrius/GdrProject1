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
            $table->float('quantita', 8,3);
            $table->foreignId('id_user_to');
            $table->foreignId('id_user_from')->nullable();
            $table->string('motivazione');
            
            $table->foreign('id_user_to')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user_from')->references('id')->on('users')->onDelete('set null');
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
