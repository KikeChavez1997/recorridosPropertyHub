<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedads', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_id');
            $table->string('cliente_name');
            $table->string('id_fecha');
            $table->string('UrlEB');
            $table->string('ClaveEB')->nullable();
            $table->string('UbicacionUrl')->nullable();
            $table->string('Inmobiliaria')->nullable();
            $table->string('MontoPorcentaje')->nullable();
            $table->string('QuienAtiendeTel')->nullable();
            $table->string('AsesorMuestra')->nullable();
            $table->string('Telefono')->nullable();
            $table->string('TelefonoAsesor')->nullable();
            $table->string('EstadoConfirmado')->nullable();
            $table->string('EstadoReconfirmado')->nullable();
            $table->string('Horario')->nullable();
            $table->string('HorarioFin')->nullable();
            $table->string('MetrosTerreno')->nullable();
            $table->string('PrecioMQ')->nullable();
            $table->string('DieccionCita')->nullable();
            $table->string('Precio')->nullable();
            $table->string('MetrosContruccion')->nullable();
            $table->string('Predial')->nullable();
            $table->string('Mantenimiento')->nullable();
            $table->string('Precio-mtc')->nullable();
            $table->string('Observaciones')->nullable();
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
        Schema::dropIfExists('propiedads');
    }
}
