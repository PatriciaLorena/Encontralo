<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use PDF;
use App\Categoria;
use App\Marca;

class PDFController extends Controller
{
  public function PDFCategoria()
    {
        $categoria = Categoria::all();
        $pfd = PDF::loadView('categoria', compact('categoria'));
        return $pfd->stream('categoria.pdf');
    }
    public function PDFMarca()
      {
          $marca = Marca::all();
          $pfd = PDF::loadView('marca', compact('marca'));
          return $pfd->stream('marca.pdf');
      }
}
