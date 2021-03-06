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
            $table->string("cap", 16);
            $table->string("tel1",16);
            $table->string("tel2",16)->nullable();
            $table->string("email",32);
            $table->string("tipodocumento",32);
            $table->string("iddocumento",32);
            $table->string("centrovisita");

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
