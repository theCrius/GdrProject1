<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->date('data_di_nascita')->nullable();
            $table->string('email');
            $table->string('nazionalità');
            $table->string('password');
            $table->string('url_music')->nullable();
            $table->enum('sesso',['m','f']);
            $table->foreignId('id_razza')->nullable();
            $table->foreignId('id_emisfero')->nullable();
            $table->text('note_fato')->nullable();
            $table->text('background')->nullable();
            $table->text('note_off')->nullable();
            $table->string('role')->default('ROLE_UTENTE');
            $table->string('immagine_avatar')->default('/img/imgHomeInterna/home/schedaPg/avatar.png');
            $table->string('immagine_miniavatar')->default('/img/imgHomeInterna/home/schedaPg/miniavatar.png');
            $table->dateTime('last_activity');
            $table->json('last_chat')->nullable();
            $table->integer('forza')->default(0);
            $table->integer('destrezza')->default(0);
            $table->integer('resistenza')->default(0);
            $table->integer('prontezza')->default(0);
            $table->integer('percezione')->default(0);
            $table->integer('intelligenza')->default(0);
            $table->timestamps();
            
            $table->foreign('id_emisfero')->references('id')->on('hemisperes')->onDelete('set null');
            $table->foreign('id_razza')->references('id')->on('breeds')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
