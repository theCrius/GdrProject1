<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Breeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeds', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->integer('forza');
            $table->integer('destrezza');
            $table->integer('resistenza');
            $table->integer('prontezza');
            $table->integer('percezione');
            $table->integer('intelligenza');
            $table->integer('punti_mente');
            $table->integer('punti_corpo');
            $table->text('descrizione');
            $table->text('immagini');
            $table->integer('forzaLimite');
            $table->integer('destrezzaLimite');
            $table->integer('resistenzaLimite');
            $table->integer('prontezzaLimite');
            $table->integer('percezioneLimite');
            $table->integer('intelligenzaLimite');
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
