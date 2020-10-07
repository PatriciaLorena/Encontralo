@extends ('layouts.admin')
@section ('contenido')
	<div class="container">
        <div class="col-8">
            <h1>Editar articulo</h1>
            <form method="POST" action="{{route("articulo.update", [$articulo])}}" enctype="multipart/form-data">
                @method("PUT")
                @csrf
				</div>
<div class="row">

								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input required maxlength="255" value="{{$articulo->nombre}}" autocomplete="off" name="nombre"
                           class="form-control"
                           type="text" placeholder="Nombre del articulo">
                </div>
								</div>
								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
	                <div class="form-group">
										<label for="categoria">Categoria</label>
										<select name="idCategoria" class="form-control">
											@foreach ($categorias as $cat)
											@if($cat->idCategoria==$articulo->idCategoria)
												<option value="{{$cat->idCategoria}}" selected>{{$cat->nombre}}</option>
											@else
												<option value="{{$cat->idCategoria}}" selected>{{$cat->nombre}}</option>
											@endif
											@endforeach
										</select>
	                </div>
								</div>
								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                	<div class="form-group">
	                    <label for="marca">Marca</label>
											<select name="idMarca" class="form-control">
													@foreach ($marcas as $mar)
													@if($mar->idMarca==$articulo->idMarca)
														<option value="{{$mar->idMarca}}" selected>{{$mar->nombre}}</option>
													@else
														<option value="{{$mar->idMarca}}" selected>{{$mar->nombre}}</option>
													@endif
													@endforeach
											</select>
                	</div>
								</div>
								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="empresa">Empresa</label>
										<select name="idEmpresa" class="form-control">
											@foreach ($empresas as $emp)
											@if($emp->idEmpresa==$articulo->idEmpresa)
												<option value="{{$emp->idEmpresa}}" selected>{{$emp->nombreEmpresa}}</option>
											@else
												<option value="{{$emp->idEmpresa}}" selected>{{$emp->nombreEmpresa}}</option>
											@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="codigo">Codigo</label>
                    <input required maxlength="255" value="{{$articulo->codigo}}" autocomplete="off" name="codigo"
                           class="form-control"
                           type="text" placeholder="Nombre de la categoria">
                </div>
								</div>
								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input required unique maxlength="100" value="{{$articulo->descripcion}}" autocomplete="off" name="descripcion"
                           class="form-control"
                           type="text" placeholder="descripcion">
                </div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="imagen">Imagen</label>
										<input type="file" name="imagen" class="form-control" >
										@if(($articulo->imagen)!="")
										<img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height="300px" width="300px">
										@endif
									</div>
								</div>

                <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                                <button type="reset" class="btn btn-primary">
                                    {{ __('Cancelar') }}
                                </button>
                            </div>
                </div>
            </form>
						</div>
    </div>
@endsection
