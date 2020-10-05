<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_classe')->nullable()->default(NULL);
            $table->foreignId('id_hemispere')->nullable()->default(NULL);
            $table->foreignId('id_breed')->nullable()->default(NULL);
            $table->text('description');
            $table->string('name');

            $table->foreign('id_classe')->references('id')->on('classes');
            $table->foreign('id_hemispere')->references('id')->on('hemisperes');
            $table->foreign('id_breed')->references('id')->on('breeds');

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
        Schema::dropIfExists('table_skills');
    }
}
