@extends ('layouts.admin')
@section ('contenido')
<div class="container">
    <h2>Lista de categorias registradas
      <a href="" target="_blank" type="button" class="btn btn-primary">Reporte Categoria</a>
      <a href="categoria/create"><button type="button" class="btn btn-success float-right">Agregar Categoria</button></a>
    </h2>
    <h6>
      @if($search ?? '')
        <div class="alert alert-primary" role="alert">
            Los resultados de tu busqueda '{{ $search ?? '' }}' son:
        </div>
      @endif
    </h6>
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
