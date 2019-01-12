<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recapiti_paziente', function (Blueprint $table){
            $table->foreign('paziente_id')
                ->references('id')->on('paziente')->onDelete('cascade');
        });

        Schema::table('medico', function (Blueprint $table){
            $table->foreign('paziente_id')
                ->references('id')->on('paziente')->onDelete('cascade');
        });

        Schema::table('diagnosi', function (Blueprint $table){
            $table->foreign('paziente_id')
                ->references('id')->on('paziente')->onDelete('cascade');
        });

        Schema::table('medicinale', function (Blueprint $table){
            $table->foreign('paziente_id')
                ->references('id')->on('paziente')->onDelete('cascade');
        });

        Schema::table('storia_clinica', function (Blueprint $table){
            $table->foreign('paziente_id')
                ->references('id')->on('paziente')->onDelete('cascade');
        });

        Schema::table('intervento', function (Blueprint $table){
            $table->foreign('paziente_id')
                ->references('id')->on('paziente')->onDelete('cascade');
        });

        Schema::table('foto', function (Blueprint $table){
            $table->foreign('paziente_id')
                ->references('id')->on('paziente')->onDelete('cascade');
        });

        Schema::table('radiografie', function (Blueprint $table){
            $table->foreign('paziente_id')
                ->references('id')->on('paziente')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
