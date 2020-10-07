<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reporte Articulo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <h1 align="center">Reporte Articulo</h1>
    </header>
    <table class="table table-striped">
        <thead>
          <tr>

                    <th scope="col">Nombre</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Codido</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Estado</th>
                  </tr>
                </thead>
            <tbody>
                  @foreach ($articulo as $art)
                  <tr>

                    <td>{{ $art->nombre}}</td>
                    <td>{{ $art->categorias}}</td>
                    <td>{{ $art->marcas}}</td>
                    <td>{{ $art->empresas}}</td>
                    <td>{{ $art->codigo}}</td>
                    <td>{{ $art->descripcion}}</td>
                    <td>
                      
                    </td>
                    <td>{{ $art->estado}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </body>
</html>
