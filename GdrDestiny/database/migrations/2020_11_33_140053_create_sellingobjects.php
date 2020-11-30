<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellingobjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('sellingobjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('descrizione');
            $table->integer('prize');
            $table->foreignId('id_category');
            $table->timestamps();

            $table->foreign('id_category')->references('id')->on('sellingobjectcategorys')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellingobjects');
    }
}
