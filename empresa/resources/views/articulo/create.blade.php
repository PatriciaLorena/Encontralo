@extends ('layouts.admin')
@section ('contenido')
<div class="container">
 @if(count($errors) > 0)
		<div class="errors">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif
<div class="row">
  <h1>Agregar Articulo</h1>
    <form method="POST" action="{{route("articulo.store")}}" enctype="multipart/form-data">
      @csrf
</div>
<div class="row">
  <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
  <div class="form-group">
    <label>Empresa</label>
    <select name="idEmpresa" class="form-control">
      @foreach ($empresas as $emp)
        <option value="{{$emp->idEmpresa}}">{{$emp->nombreEmpresa}}</option>
      @endforeach
    </select>
  </div>
</div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label >Nombre</label>
            <input id="nombre" type="text" class="form-control @error('alpha') is-invalid @enderror"
            name="nombre" value="{{ old('nombre') }}" required maxlength="255"
            autocomplete="nombre" placeholder="Ingrese el nombre del articulo" autofocus>
              @error('alpha')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
         </div>
      </div>

      <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Categoria</label>
				<select name="idCategoria" class="form-control">
					@foreach ($categorias as $cat)
						<option value="{{$cat->idCategoria}}">{{$cat->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Marca</label>
				<select name="idMarca" class="form-control">
					@foreach ($marcas as $mar)
						<option value="{{$mar->idMarca}}">{{$mar->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
      <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label>Codigo</label>
            <input required  maxlength="200" autocomplete="codigo" value="{{ old('codigo') }}"
             name="codigo" class="form-control"
            type="text" maxlength="200" placeholder="Ingrese su codigo">
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label>Descripcion</label>
            <input required  maxlength="200" autocomplete="descripcion" value="{{ old('descripcion') }}"
             name="descripcion" class="form-control"
            type="text" maxlength="200" placeholder="Ingrese su descripcion">
        </div>
      </div>
      <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
			     <div class="form-group">
				         <label for="imagen">Imagen</label>
				             <input type="file" name="imagen" >
			     </div>
		 </div>
      <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Aceptar') }}
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
