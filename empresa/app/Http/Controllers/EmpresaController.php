<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Illuminate\Http\Request;

use App\Empresa;
use App\Http\Requests\EmpresaFormRequest;

class EmpresaController extends Controller
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
      $empresa = Empresa::where('nombreEmpresa', 'LIKE', '%' . $query . '%')
        ->orderBy('idEmpresa', 'asc')
        ->paginate(5);

      return view('empresa.index', ['empresa' => $empresa, 'searchText'=> $query]);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa();

        $empresa-> nombreEmpresa = request( 'nombreEmpresa');
        $empresa-> direccion = request( 'direccion');
        $empresa-> ruc = request( 'ruc');
        $empresa-> telefono = request( 'telefono');
        $empresa-> correo = request( 'correo');
        $empresa-> descripcion = request( 'descripcion');

        $empresa->save();

        return redirect( '/empresa')->with('success', 'Empresa saved!');
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
    public function edit($idEmpresa)
    {
        return view('empresa.edit', ['empresa' => Empresa::findOrFail($idEmpresa)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEmpresa)
    {
        $empresa = Empresa::findOrFail($idEmpresa);

        $empresa-> nombreEmpresa = $request->get('nombreEmpresa');
        $empresa-> direccion = $request->get('direccion');
        $empresa-> ruc = $request->get('ruc');
        $empresa-> telefono = $request->get('telefono');
        $empresa-> correo = $request->get('correo');
        $empresa-> descripcion = $request->get('descripcion');
        $empresa->update();

        return redirect( '/empresa');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idEmpresa)
    {
        $empresa = Empresa::findOrFail($idEmpresa);

        $empresa->delete();

        return redirect( '/empresa');
    }
}
