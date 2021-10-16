<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserisincureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userisincures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor');
            $table->foreignId('patient');
            $table->timestamp('start_cure');
            $table->timestamp('finish_cure');
            $table->integer('point_recupered_at_day');
            $table->boolean('sanitamentale')->default(false);
            $table->json('medicalrecordsToDelete');
            $table->timestamps();

            $table->foreign('doctor')->references('id')->on('users');
            $table->foreign('patient')->references('id')->on('users')->onDelete('cascade');;


            

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userisincure');
    }
}
