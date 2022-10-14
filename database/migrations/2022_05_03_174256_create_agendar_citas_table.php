<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendarCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendar_citas', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('asesorComercial');
            $table->date('fecha');

            //$table->dateTime('start');
            //$table->dateTime('end');

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
        Schema::dropIfExists('agendar_citas');
    }
}
