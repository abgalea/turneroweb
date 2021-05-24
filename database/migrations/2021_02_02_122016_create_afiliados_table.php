<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfiliadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('afiliados', function (Blueprint $table) {
        //     $table->integer('nro_doc',8)->unique();
        //     $table->integer('nro_gru_familiar')->nullable();
        //     $table->string('nom_titular',100)->nullable();
        //     $table->string('cuil_titular',13)->nullable();
        //     $table->string('tipo_familia',10)->nullable();
        //     $table->string('clase_familia',10)->nullable();
        //     $table->string('tipo_documento',3)->nullable();
        //     $table->string('prefijo',10)->nullable();
        //     $table->string('nom_beneficiario',100)->nullable();
        //     $table->string('cuil_beneficiario',13)->nullable();
        //     $table->date('nacimiento')->nullable();
        //     $table->integer('edad')->nullable();
        //     $table->string('sexo',1)->nullable();
        //     $table->string('estado_civil')->nullable();
        //     $table->string('nacionalidad')->nullable();
        //     $table->string('calle')->nullable();
        //     $table->string('numero')->nullable();
        //     $table->string('piso')->nullable();
        //     $table->string('cod_postal',10)->nullable();
        //     $table->string('localidad',50)->nullable();
        //     $table->string('provincia',50)->nullable();
        //     $table->string('telefono',50)->nullable();
        //     $table->string('plan',50)->nullable();
        //     $table->date('vigencia')->nullable();
        //     $table->string('credencial',50)->nullable();
        //     $table->string('codigo_ingreso',60)->nullable();
        //     $table->string('pmi',50)->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afiliados');
    }
}
