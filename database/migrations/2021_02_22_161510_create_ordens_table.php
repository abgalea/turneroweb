<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('ordenes', function (Blueprint $table) {
        //     $table->id();
        //     $table->date('fecha')->nullable();
        //     $table->date('vencimiento')->nullable();
        //     $table->integer('estado')->nullable();
        //     $table->unsignedInteger('nro_doc'); // Relación con afiliados
        //     $table->string('profesional')->nullable();
        //     $table->string('especialidad')->nullable();
        //     $table->string('prestacion')->nullable();
        //     $table->string('cantidad')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordens');
    }
}
