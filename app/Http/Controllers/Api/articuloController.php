<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;
use App\Empresa;

class articuloController extends Controller
{
    function all(){
      $articulos = Articulo::join('empresas', 'articulos.idEmpresa', '=', 'empresas.idEmpresa')
      ->select('articulos.*', 'empresas.nombreEmpresa', 'empresas.latitud', 'empresas.longitud')
      ->get();
      return $articulos;
    }
}

