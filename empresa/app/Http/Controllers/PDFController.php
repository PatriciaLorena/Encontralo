<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use PDF;
use App\Categoria;

class PDFController extends Controller
{
  public function PDFCategoria()
    {
        $categoria = Categoria::all();
        $pfd = PDF::loadView('categoria', compact('categoria'));
        return $pfd->stream('categoria.pdf');
    }
}
