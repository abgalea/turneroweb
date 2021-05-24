<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->date('vencimiento')->nullable();
            $table->integer('estado')->nullable();
            $table->unsignedInteger('nro_doc'); // Relación con afiliados
            $table->unsignedInteger('copago_id'); // Relación con copago
            $table->unsignedInteger('users_id'); // Relación con usuarios
            $table->integer('cantidad'); // Relación con usuarios
            $table->unsignedInteger('medio_pagos_id'); // Relación con medio pagos
            $table->integer('pagado')->default(0); // estado 1 pagado - estado 0 pendiente
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
        Schema::dropIfExists('ordenes');
    }
}
