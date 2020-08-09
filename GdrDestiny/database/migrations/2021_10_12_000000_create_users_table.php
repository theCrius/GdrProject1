<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->date('data_di_nascita')->nullable();
            $table->string('email');
            $table->string('nazionalità');
            $table->string('password');
            $table->enum('sesso',['m','f']);
            $table->foreignId('id_class1')->nullable();
            $table->foreignId('id_class2')->nullable();
            $table->foreignId('id_razza');
            $table->foreignId('id_emisfero');
            $table->text('note_fato')->nullable();
            $table->text('background')->nullable();
            $table->text('note_off')->nullable();
            $table->string('indirizzo_ip');
            $table->string('role')->nullable();
            $table->string('immagine_avatar')->default('/img/imgHomeInterna/home/schedaPg/avatar.png');
            $table->rememberToken();
            $table->dateTime('last_activity');
            $table->integer('forza')->default(0);
            $table->integer('destrezza')->default(0);
            $table->integer('resistenza')->default(0);
            $table->integer('prontezza')->default(0);
            $table->integer('percezione')->default(0);
            $table->integer('intelligenza')->default(0);
            $table->timestamps();
            
            $table->foreign('id_emisfero')->references('id')->on('hemisperes');
            $table->foreign('id_class1')->references('id')->on('classes');
            $table->foreign('id_class2')->references('id')->on('classes');
            $table->foreign('id_razza')->references('id')->on('breeds');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
