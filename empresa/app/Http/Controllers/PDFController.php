<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use PDF;
use App\Categoria;
use App\Marca;
use App\Articulo;
use App\Empresa;
use DB;

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

      public function PDFEmpresa()
        {
            $empresa = Empresa::all();
            $pfd = PDF::loadView('empresa', compact('empresa'));
            return $pfd->stream('empresa.pdf');
        }

        public function PDFArticulo()
          {
              $articulo = Articulo::all();
              $empresas=DB::table('empresas')->get();
              $marcas=DB::table('marcas')->get();
              $categorias=DB::table('categorias')->get();
              $pfd = PDF::loadView('articulo', compact('articulo'));
              return $pfd->stream('articulo.pdf');
          }
}
