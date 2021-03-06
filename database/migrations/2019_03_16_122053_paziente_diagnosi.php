<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PazienteDiagnosi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paziente_diagnosi', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('paziente_id')->nullable();
            $table->unsignedInteger("diagnosi_id")->nullable();
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
        Schema::dropIfExists('paziente_diagnosi');
    }
}
