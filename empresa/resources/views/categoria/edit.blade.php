@extends ('layouts.admin')
@section ('contenido')
	<div class="container">
        <div class="col-8">
            <h1>Editar categoria</h1>
            <form method="POST" action="{{route("categoria.update", [$categoria])}}" >
                @method("PUT")
                @csrf
								<div class="col-sm-8">
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required maxlength="255" value="{{$categoria->nombre}}" autocomplete="off" name="nombre"
                           class="form-control"
                           type="text" placeholder="Nombre de la categoria">
                </div>
								</div>
								<div class="col-sm-8">
                <div class="form-group">
                    <label class="label">Descripcion</label>
                    <input unique maxlength="100" value="{{$categoria->descripcion}}" autocomplete="off" name="descripcion"
                           class="form-control"
                           type="text" placeholder="descripcion">
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
