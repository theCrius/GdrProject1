<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellingmechaobjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellingmechaobjects', function (Blueprint $table) {

            $enumPartsMecha=\Config::get('mecha.partsOfMecha');

            $table->id();
            $table->string('name');
            $table->text('descrizione');
            $table->integer('prize');
            $table->integer('usura');
            $table->integer('velocita');
            $table->integer('resistenza');
            $table->integer('potenza');

            $table->enum('partmecha', $enumPartsMecha);

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
        Schema::dropIfExists('mecha_objects');
    }
}
