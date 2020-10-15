<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_empresas', function (Blueprint $table) {
          $table->increments('idUsuarioEmpresa');
          $table->timestamps();
          $table->unsignedInteger("idEmpresa");
          $table->foreign("idEmpresa")
              ->references("idEmpresa")
              ->on("empresas")
              ->onDelete("cascade")
              ->onUpdate("cascade");
          $table->unsignedBigInteger("id");
          $table->foreign("id")
              ->references("id")
              ->on("users")
              ->onDelete("cascade")
              ->onUpdate("cascade");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_empresas');
    }
}
