<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Empresa;

class empresaController extends Controller
{
    function all(){
      $empresa = Empresa::all();
      return $empresa;
    }
}
