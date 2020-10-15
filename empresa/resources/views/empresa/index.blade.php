@extends ('layouts.admin')
@section ('contenido')
<div class="container">
    <h2>Lista de empresas registradas
      <a href="{{ route('reportePDFEmpresa')}}" target="_blank" type="button" class="btn btn-primary">Reporte Empresa</a>
      <a href="empresa/create"><button type="button" class="btn btn-success float-right">Agregar Empresa</button></a>
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
        <th scope="col">Direccion</th>
        <th scope="col">Ruc</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo</th>
        <th scope="col">Descripcion</th>
      </tr>
    </thead>
<tbody>
      @foreach($empresa as $emp)
      <tr>
        <td>{{$emp->nombreEmpresa}}</td>
        <td>{{$emp->direccion}}</td>
        <td>{{$emp->ruc}}</td>
        <td>{{$emp->telefono}}</td>
        <td>{{$emp->correo}}</td>
        <td>{{$emp->descripcion}}</td>
        <td>
          <form action="{{route('empresa.destroy', $emp->idEmpresa)}}" method="post">
              <a href="{{ route('empresa.edit', $emp->idEmpresa)}}"><button type="button" class="btn btn-primary">Editar</button></a>
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

{{$empresa->render()}}
</div>

@endsection
