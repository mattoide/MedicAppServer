<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PazienteProtocollo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paziente_protocollo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('paziente_id');
            $table->unsignedInteger('protocollo_id');
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
        Schema::dropIfExists('paziente_protocollo');
    }
}
