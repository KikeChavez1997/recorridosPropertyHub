<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('id_propiedad');
            $table->string('PagoInmueble');
            $table->string('PagoEscrito');
            $table->string('Apartar');
            $table->string('ApartarEscrito');
            $table->string('PagoPeriodico');
            $table->string('PagoPeriodicoEscrito');
            $table->string('FormaPago');
            $table->string('Estado');
            $table->string('Otro')->nullable();
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
        Schema::dropIfExists('ofertas');
    }
}
