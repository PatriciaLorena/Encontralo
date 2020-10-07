<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('idArticulo');
            $table->timestamps();
            $table->unsignedInteger("idEmpresa");
            $table->foreign("idEmpresa")
                ->references("idEmpresa")
                ->on("empresas")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->unsignedInteger("idCategoria");
            $table->foreign("idCategoria")
                ->references("idCategoria")
                ->on("categorias")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->unsignedInteger("idMarca");
            $table->foreign("idMarca")
                ->references("idMarca")
                ->on("marcas")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string("nombre");
            $table->string("codigo");
            $table->string("descripcion");
            $table->string("imagen");
            $table->string("estado");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
