<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEserciziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esercizi', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('protocollo_id');
            $table->string('nome');
            $table->string('tipoesercizio');
            $table->string('immagine');
            //$table->string('descrizione');
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
        Schema::dropIfExists('esercizi');
    }
}
