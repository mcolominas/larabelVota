<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTaulas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('encuesta', function (Blueprint $table) {
            $table->increments('idEncuesta');
            $table->integer('idUsuario');
            $table->string('nombre', 100);
            $table->boolean('multirespuesta')->default(false);
            $table->string('descripcion', 200)->nullable()->default(null);
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->timestamps();

            $table->index('idUsuario');

            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('users');
        });

        Schema::create('accesoEncuesta', function (Blueprint $table) {
            $table->increments('idAcceso');
            $table->integer('idUsuario');
            $table->integer('idEncuesta');
            $table->timestamps();

            $table->index('idUsuario');
            $table->index('idEncuesta');

            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('users');

            $table->integer('idEncuesta')->unsigned();
            $table->foreign('idEncuesta')->references('idEncuesta')->on('encuesta');
        });

        Schema::create('opcionesEncuesta', function (Blueprint $table) {
            $table->increments('idOpcion');
            $table->integer('idEncuesta');
            $table->string('nombre', 100);
            $table->timestamps();

            $table->index('idEncuesta');

            $table->integer('idEncuesta')->unsigned();
            $table->foreign('idEncuesta')->references('idEncuesta')->on('encuesta');
        });
        
        Schema::create('permiso', function (Blueprint $table) {
            $table->increments('idPermiso');
            $table->string('nombre', 100);
            $table->string('descripcion', 200)->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create('votosEncuesta', function (Blueprint $table) {
            $table->increments('idVoto');
            $table->integer('idUsuario');
            $table->integer('idOpcion');
            $table->timestamps();

            $table->index('idUsuario');
            $table->index('idOpcion');

            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('idUsuario')->on('accesoEncuesta');

            $table->integer('idOpcion')->unsigned();
            $table->foreign('idOpcion')->references('idOpcion')->on('opcionesEncuesta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta');
        Schema::dropIfExists('accesoEncuesta');
        Schema::dropIfExists('opcionesEncuesta');
        Schema::dropIfExists('permiso');
        Schema::dropIfExists('votosEncuesta');
    }
}
