<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiuviejosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciuviejos', function (Blueprint $table) {
            $table->id();
            $table->string('orden',100);
            $table->date('fecha');
            $table->date('desde');
            $table->date('hasta');
            $table->string('nombre');
            $table->string('comercio');
            $table->string('actividad');
            $table->string('direccion');
            $table->string('certificado',100);
            $table->string('previa');
            $table->string('legajo');
            $table->string('alta');
            $table->string('hoy');
            $table->string('borrado');
            $table->string('lugar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciuviejos');
    }
}
