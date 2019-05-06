<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaziente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paziente', function (Blueprint $table) {
            $table->increments('id');
//            $table->unsignedInteger('recapiti_paziente_id')->nullable();

            $table->string('nome', 32);
            $table->string('cognome', 32);
            $table->string('sesso', 1);
            $table->date('datadinascita');
            $table->string('email');
            $table->string('password');

            $table->longText('tokenfirebase');
            $table->boolean('attivo');


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
        Schema::dropIfExists('paziente');
    }
}
