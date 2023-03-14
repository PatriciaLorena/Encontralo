<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Illuminate\Http\Request;

use App\Marca;
use App\Http\Requests\MarcaFormRequest;


class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request) {
      $query = trim($request->get('searchText'));
      $marca = Marca::where('nombre', 'LIKE', '%' . $query . '%')
        ->orderBy('idMarca', 'asc')
        ->paginate(5);

      return view('marca.index', ['marca' => $marca, 'searchText'=> $query]);
    }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $marca = new Marca();

      $marca-> nombre = request( 'nombre');
      $marca-> descripcion = request( 'descripcion');

      $marca->save();

      return redirect( '/marca')->with('success', 'marca saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idMarca)
    {
        return view('marca.edit', ['marca' => Marca::findOrFail($idMarca)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(MarcaFormRequest  $request, $idMarca)
     {
         $marca = Marca::findOrFail($idMarca);

         $marca-> nombre = $request->get( 'nombre' );
         $marca-> descripcion = $request->get( 'descripcion');
         $marca->update();

         return redirect( '/marca');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idMarca)
    {
      $marca = Marca::findOrFail($idMarca);

      $marca->delete();

      return redirect( '/marca');
    }
}
