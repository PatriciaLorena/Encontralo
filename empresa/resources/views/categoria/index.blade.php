@extends ('layouts.admin')
@section ('contenido')
<div class="container">
    <h2>Lista de categorias registradas
      <a href="{{ route('reportePDF')}}" target="_blank" type="button" class="btn btn-primary">Reporte Categoria</a>
      <a href="categoria/create"><button type="button" class="btn btn-success float-right">Agregar Categoria</button></a>
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
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
      </tr>
    </thead>
<tbody>
      @foreach($categoria as $cat)
      <tr>
        <td>{{$cat->nombre}}</td>
        <td>{{$cat->descripcion}}</td>
        <td>
          <form action="{{route('categoria.destroy', $cat->idCategoria)}}" method="post">
              <a href="{{ route('categoria.edit', $cat->idCategoria) }}"><button type="button" class="btn btn-primary">Editar</button></a>

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

{{$categoria->render()}}
</div>

@endsection
