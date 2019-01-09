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
            $table->integer("id_paziente");

            $table->string("indirizzo");
            $table->string("citta");
            $table->string("paese");
            $table->string("cap");
            $table->string("tel1");
            $table->string("tel2");
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
