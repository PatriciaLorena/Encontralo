@extends ('layouts.admin')
@section ('contenido')
<div class="container">
    <h2>Lista de Marcas registradas
      <a href="" target="_blank" type="button" class="btn btn-primary">Reporte Marca</a>
      <a href="marca/create"><button type="button" class="btn btn-success float-right">Agregar marca</button></a>
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
      @foreach($marca as $mar)
      <tr>
        <td>{{$mar->nombre}}</td>
        <td>{{$mar->descripcion}}</td>
        <td>
          <form action="{{route('marca.destroy', $mar->idMarca)}}" method="post">
              <a href="{{ route('marca.edit', $mar->idMarca) }}"><button type="button" class="btn btn-primary">Editar</button></a>

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

{{$marca->render()}}
</div>

@endsection
