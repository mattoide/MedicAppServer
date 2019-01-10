<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecapitiPaziente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recapiti_paziente', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('paziente_id')->nullable();

            $table->string("indirizzo", 64);
            $table->string("citta",64);
            $table->string("paese",64);
            $table->string("cap", 16)->nullable();
            $table->string("tel1",16)->nullable();
            $table->string("tel2",16)->nullable();
            $table->string("email",32)->nullable();

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
        Schema::dropIfExists('recapiti_paziente');
    }
}
