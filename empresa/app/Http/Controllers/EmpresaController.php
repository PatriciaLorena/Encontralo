<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Illuminate\Http\Request;

use App\Empresa;
use App\Usuario_empresa;
use App\User;

use Auth;

use App\Http\Requests\EmpresaFormRequest;
use App\Http\Requests\Usuario_EmpresaRequest;
use DB;

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
      $usuarioEmpresa= DB::table('usuario_empresas')->get();
      $user= DB::table('users')->get();
      $id = Auth::user()->id;
      $empresa = DB::table('empresas as e')
      ->join('usuario_empresas as ue','ue.idEmpresa','=','e.idEmpresa')
      ->join('users as u','ue.id','=','u.id')
      ->select('e.idEmpresa','e.nombreEmpresa','e.direccion','e.ruc', 'e.telefono','e.correo',
      'e.descripcion','ue.id')
      ->where('ue.id','=',$id)
      ->where('nombreEmpresa', 'LIKE', '%' . $query . '%')
      ->groupBy('e.idEmpresa','e.nombreEmpresa','e.direccion','e.ruc', 'e.telefono','e.correo',
      'e.descripcion','ue.id')
        ->paginate(5);

      return view('empresa.index', ['empresa' => $empresa, 'usuario_empresas'=>$usuarioEmpresa, 'users'=>$user, 'searchText'=> $query]);

    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas=DB::table('empresas')->get();
        $usuarioEmpresa = DB::table('usuario_empresas')->get();
        return view("empresa.create",["empresas"=>$empresas,"usuario_empresas"=>$usuarioEmpresa]);
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
        $empresa-> latitud = request( 'latitud');
        $empresa-> longitud = request( 'longitud');
        $empresa->save();



        $usuarioEmpresa=new Usuario_empresa();
        $id = Auth::user()->id;
                $usuarioEmpresa->idEmpresa=$empresa->idEmpresa;
                $usuarioEmpresa->id=$id;

                $usuarioEmpresa->save();



        return redirect( '/empresa')->with('success', 'Empresa saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idEmpresa)
    {
      $empresa=DB::table('empresa as e')
        ->join('usuario_empresas as ue','ue.idEmpresa','=','e.idEmpresa')
        ->join('users as u','u.id','=','ue.id')
        ->select('e.idEmpresa','e.nombreEmpresa','e.direccion','e.ruc', 'e.telefono','e.correo',
        'e.descripcion')
         ->where('u.idEmpresa','=','$idEmpresa')
         ->groupBy('e.idEmpresa','e.nombreEmpresa','e.direccion','e.ruc', 'e.telefono','e.correo',
         'e.descripcion')
         ->first(); // Arriba ya se utilizo group by, acá utilizar first para traer únicamente el primero.
         $usuarioEmpresa=DB::table('usuario_empresas as u')
            ->join('empresa as e','e.idEmpresa','=','u.idEmpresa')
            ->get();

     return view("empresa.show",["empresa"=>$empresa,"usuario_empresas"=>$usuarioEmpresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idEmpresa)
    {
      $usuarioEmpresa = DB::table('usuario_empresas')->get();
        return view('empresa.edit', ['empresa' => Empresa::findOrFail($idEmpresa),"usuario_empresas"=>$usuarioEmpresa]);

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
