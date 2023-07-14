<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;

class articuloController extends Controller
{
    function all(){
      $articulo = Articulo::all();
      return $articulo;
    }
}
