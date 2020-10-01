@extends ('layouts.admin')
@section ('content')
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
<div class="col-12">
  <h1>Agregar proveedor</h1>
    <form method="POST" action="{{route("categorias.store")}}">
      @csrf
      <div class="col-sm-6">
        <div class="form-group">
          <label class="label">Nombre</label>
            <input id="nombre" type="text" class="form-control @error('alpha') is-invalid @enderror"
            name="nombreEmpresa" value="{{ old('nombre') }}" required maxlength="255"
            autocomplete="nombre" placeholder="Ingrese el nombre de la categoria" autofocus>
              @error('alpha')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
        </div>
      </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label class="label">Descripcion</label>
            <input required  maxlength="200" autocomplete="descripcion" value="{{ old('descripcion') }}" name="descripcion" class="form-control"
            type="text" maxlength="200" placeholder="Ingrese su direccion">
        </div>
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
