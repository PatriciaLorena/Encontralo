<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Articulo;
use Illuminate\Support\Facades\Redired;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\ArticuloFormRequest;

//use App\Categoria;

use DB;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request)
    {
      $query=trim($request->get('searchText'));
      $articulos=DB::table('articulos as a')
      ->join('categorias as c','a.idCategoria','=','c.idCategoria')
      ->join('marcas as m','a.idMarca','=','m.idMarca')
      ->select('a.idArticulo','a.nombre','a.codigo','c.nombre as categorias',
      'm.nombre as marcas','a.descripcion','a.imagen','a.estado')
      ->where('a.nombre','LIKE','%'.$query.'%')
      ->orwhere('a.codigo','LIKE','%'.$query.'%')
      ->orderBy('idArticulo','desc')
      ->paginate(5);
      return view('articulo.index',['articulos' => $articulos,"searchText"=>$query]);

    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categorias=DB::table('categorias')->get();
      $marcas=DB::table('marcas')->get();
      return view("articulo.create",["categorias"=>$categorias],["marcas"=>$marcas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(ArticuloFormRequest $request)
     {
     	$articulo=new Articulo;
     	$articulo->idCategoria=$request->get('idCategoria');
      $articulo->idMarca=$request->get('idMarca');
      $articulo->nombre=$request->get('nombre');
     	$articulo->codigo=$request->get('codigo');
     	$articulo->descripcion=$request->get('descripcion');
     	$articulo->estado='Activo';

     	//almacenar imagen

        if ($request->hasFile('imagen')) {
             //$path = $request->file('imagen')->store('imagenes')
             $file = $request->file('imagen');
             $file->move(public_path() . '/imagenes/articulos/', $file->getClientOriginalName());
             $articulo->imagen = $file->getClientOriginalName();
         }

     	$articulo->save();
     	return Redirect('articulo');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idArticulo)
    {
        return view("articulo.show",["articulo"=>Articulo::findOrFail($idArticulo)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idArticulo)
    {
      $articulo=Articulo::findOrFail($idArticulo);
      $categorias=DB::table('categorias')->get();
      $marcas=DB::table('marcas')->get();
      return view("articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias,"marcas"=>$marcas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(ArticuloFormRequest $request,$idArticulo)
     {
     	$articulo=Articulo::findOrFail($idArticulo);

      $articulo->idCategoria=$request->get('idCategoria');
      $articulo->idMarca=$request->get('idMarca');
      $articulo->nombre=$request->get('nombre');
     	$articulo->codigo=$request->get('codigo');
     	$articulo->descripcion=$request->get('descripcion');

     	//almacenar imagen

        if ($request->hasFile('imagen')) {
             //$path = $request->file('imagen')->store('imagenes')
             $file = $request->file('imagen');
             $file->move(public_path() . '/imagenes/articulos/', $file->getClientOriginalName());
             $articulo->imagen = $file->getClientOriginalName();
         }

     	$articulo->update();
     	return Redirect('articulo');

      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idArticulo)
    {
      $articulo=Articulo::findOrFail($idArticulo);
      $articulo->estado='Inactivo';
      $articulo->update();
      return Redirect('articulo');
    }
}
