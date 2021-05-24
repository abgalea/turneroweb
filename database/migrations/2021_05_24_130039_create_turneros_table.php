<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turneros', function (Blueprint $table) {
            $table->id();
            $table->integer('dni');
            $table->integer('numero')->nullable();
            $table->timestamp('solicitud')->nullable();
            $table->timestamp('inicio')->nullable();
            $table->timestamp('fin')->nullable();
            $table->timestamp('cancelado')->nullable();
            $table->integer('users_id')->nullable();
            $table->integer('categoria')->nullable();
            $table->integer('estados_id')->nullable();
            $table->string('box')->nullable();
            $table->integer('sucursale_id')->nullable();
            $table->integer('impreso')->nullable();
            $table->integer('vip')->nullable();
            $table->integer('sms')->nullable();

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
        Schema::dropIfExists('turneros');
    }
}
