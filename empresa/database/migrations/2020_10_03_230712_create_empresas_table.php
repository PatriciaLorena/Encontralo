<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
          $table->increments('idEmpresa');
          $table->timestamps();
          $table->string('nombreEmpresa');
          $table->string('direccion');
          $table->string('ruc');
          $table->string('telefono');
          $table->string('correo')->nullable();
          $table->string('descripcion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
