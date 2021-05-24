<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orden',100);
            $table->string('nro_certificado',100);
            $table->date('fecha');
            $table->date('desde');
            $table->date('hasta');
            $table->string('nombre_comerciante');
            $table->string('telefono_contacto');
            $table->string('correo_contacto');
            $table->string('nombre_comercio');
            $table->string('rubro');
            $table->string('direccion');
            $table->string('observaciones');
            $table->string('previa');
            $table->string('usuario');
            $table->string('dependencia');
            $table->string('localidad');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificados');
    }
}
