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
              $categoria=DB::table('categorias')->get();
              $marca=DB::table('marcas')->get();
              $empresa=DB::table('empresas')->get();
                $pfd = PDF::loadView('articulo', compact('articulo', 'categoria','marca','empresa'));

              //setpaper para mostrar de forma horizontal
              return $pfd->setPaper ( 'A4' , 'landscape' )->stream('articulo.pdf');
          }
}
