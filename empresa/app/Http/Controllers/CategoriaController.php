<?php


namespace App\Http\Controllers;
use Illuminate\Http\Requests;
use Illuminate\Http\Request;

use App\Categoria;
use App\Http\Requests\CategoriaFormRequest;



class CategoriaController extends Controller
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
         $categoria = Categoria::where('nombre', 'LIKE', '%' . $query . '%')
           ->orderBy('idCategoria', 'asc')
           ->paginate(5);

         return view('categoria.index', ['categoria' => $categoria, 'searchText'=> $query]);
       }
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
        {
            $categoria = new Categoria();

            $categoria-> nombre = request( 'nombre');
            $categoria-> descripcion = request( 'descripcion');

            $categoria->save();

            return redirect( '/categoria')->with('success', 'Contact saved!');
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
     public function edit($idCategoria)
         {
             return view('categoria.edit', ['categoria' => Categoria::findOrFail($idCategoria)]);
         }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


        public function update(CategoriaFormRequest  $request, $idCategoria)
        {
            $categoria = Categoria::findOrFail($idCategoria);

            $categoria-> nombre = $request->get( 'nombre' );
            $categoria-> descripcion = $request->get( 'descripcion');
            $categoria->update();

            return redirect( '/categoria');
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($idCategoria)
     {
         $categoria = Categoria::findOrFail($idCategoria);

         $categoria->delete();

         return redirect( '/categoria');
     }
}
