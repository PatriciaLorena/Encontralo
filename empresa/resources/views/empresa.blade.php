@extends ('layouts.admin')
@section ('contenido')
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reporte Empresa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <h1 align="center">Reporte Empresa</h1>
    </header>
    <table class="table table-striped">
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
          </tr>
          @endforeach
        </tbody>
      </table>
  </body>
</html>
