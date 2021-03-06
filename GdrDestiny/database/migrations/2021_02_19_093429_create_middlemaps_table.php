<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiddlemapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('middlemaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_topmap');
            $table->string('name');
            $table->timestamps();

            $table->foreign('id_topmap')->references('id')->on('topmaps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('middlemaps');
    }
}
