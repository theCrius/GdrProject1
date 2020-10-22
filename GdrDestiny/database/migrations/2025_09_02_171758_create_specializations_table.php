<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('livello');
            $table->foreignId('id_skill1');
            $table->foreignId('id_skill2')->nullable();
            $table->text('descrizione');
            $table->string('url_image');
            $table->timestamps();

            $table->foreign('id_skill1')->references('id')->on('skills');
            $table->foreign('id_skill2')->references('id')->on('skills');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specializations');
    }
}
