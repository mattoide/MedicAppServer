<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Intervento extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('intervento', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('paziente_id')->nullable();

            $table->date("data")->nullable();
            $table->string("intervento")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('intervento');
    }
}
