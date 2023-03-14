<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reporte Marca</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <h1 align="center">Reporte Marca</h1>
    </header>
    <table class="table table-striped">
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
          </tr>
          @endforeach
        </tbody>
      </table>
  </body>
</html>
