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
            $table->unsignedInteger('id_recapiti_paziente')->nullable();
            $table->foreign('id_recapiti_paziente')
                ->references('id')->on('recapiti_paziente')
                ->onDelete('cascade');

            $table->string("nome")->nullable();
            $table->string("cognome")->nullable();
            $table->string("sesso")->nullable();
            $table->date("data di nascita")->nullable();

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
