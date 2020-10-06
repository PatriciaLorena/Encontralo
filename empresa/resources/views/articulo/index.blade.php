@extends ('layouts.admin')
@section ('contenido')
<div class="container">
    <h2>Lista de Articulos registrados
      <a href="{{ route('reportePDFCategoria')}}" target="_blank" type="button" class="btn btn-primary">Reporte Articulo</a>
      <a href="articulo/create"><button type="button" class="btn btn-success float-right">Agregar Articulo</button></a>
    </h2>

    <nav class="navbar navbar-light float-right">
      <form class="form-inline">

        <input name="searchText" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">

           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </nav>

<table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">Empresa</th>
        <th scope="col">Nombre</th>
        <th scope="col">Categoria</th>
        <th scope="col">Marca</th>
        <th scope="col">Codido</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Imagen</th>
        <th scope="col">Estado</th>
      </tr>
    </thead>
<tbody>
      @foreach ($articulos as $art)
      <tr>
        <td></td>
        <td>{{ $art->nombre}}</td>
        <td>{{ $art->categorias}}</td>
        <td>{{ $art->marcas}}</td>
        <td>{{ $art->codigo}}</td>
        <td>{{ $art->descripcion}}</td>
        <td>
          <img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="{{ $art->nombre}}" height="100px" width="100px" class="img-thumbnail">
        </td>
        <td>{{ $art->estado}}</td>
        <td>

          <form action="{{route('articulo.destroy', $art->idArticulo)}}" method="post">
              <a href="{{ route('articulo.edit', $art->idArticulo) }}"><button type="button" class="btn btn-primary">Editar</button></a>

            @method('DELETE')   @csrf
              <button type="submit" class="btn btn-danger">Eliminar</button>
              <!-- boton eliminar con modal sin funcionamiento
              <a href=""data-target="#delete" data-toggle="modal"><button class="btn btn-danger">ELiminar</button></a>
          	  -->
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

{{$articulos->render()}}
</div>

@endsection
