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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->increments('idEncuesta')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->string('nombre', 100);
            $table->boolean('multirespuesta')->default(false);
            $table->string('descripcion', 200)->nullable()->default(null);
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->timestamps();

            $table->index('idUsuario');

            $table->foreign('idUsuario')->references('id')->on('users');
        });

        Schema::create('acceso_encuestas', function (Blueprint $table) {
            $table->increments('idAcceso')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->integer('idEncuesta')->unsigned();
            $table->timestamps();

            $table->index('idUsuario');
            $table->index('idEncuesta');

            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idEncuesta')->references('idEncuesta')->on('encuestas');
        });

        Schema::create('opciones_encuestas', function (Blueprint $table) {
            $table->increments('idOpcion')->unsigned();
            $table->integer('idEncuesta')->unsigned();
            $table->string('nombre', 100);
            $table->timestamps();

            $table->index('idEncuesta');

            $table->foreign('idEncuesta')->references('idEncuesta')->on('encuestas');
        });
        
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('idPermiso')->unsigned();
            $table->string('nombre', 100);
            $table->string('descripcion', 200)->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create('votos_encuestas', function (Blueprint $table) {
            $table->increments('idVoto')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->integer('idOpcion')->unsigned();
            $table->timestamps();

            $table->index('idUsuario');
            $table->index('idOpcion');

            $table->foreign('idUsuario')->references('idUsuario')->on('acceso_encuestas');
            $table->foreign('idOpcion')->references('idOpcion')->on('opciones_encuestas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuestas');
        Schema::dropIfExists('accesoEncuestas');
        Schema::dropIfExists('opcionesEncuestas');
        Schema::dropIfExists('permisos');
        Schema::dropIfExists('votosEncuestas');
    }
}
