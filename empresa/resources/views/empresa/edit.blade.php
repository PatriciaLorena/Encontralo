@extends ('layouts.admin')
@section ('contenido')
	<div class="container">
        <div class="col-8">
            <h1>Editar Empresa</h1>
            <form method="POST" action="{{route("empresa.update", [$empresa])}}">
                @method("PUT")
                @csrf
				</div>
<div class="row">
								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombreEmpresa">Nombre</label>
                    <input required maxlength="255" value="{{$empresa->nombreEmpresa}}" autocomplete="off" name="nombreEmpresa"
                           class="form-control"
                           type="text" placeholder="Nombre de la empresa">
                </div>
								</div>
								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input required maxlength="255" value="{{$empresa->direccion}}" autocomplete="off" name="direccion"
                           class="form-control"
                           type="text" placeholder="Direccion de la empresa">
                </div>
								</div>
								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="ruc">Ruc</label>
                    <input required maxlength="255" value="{{$empresa->ruc}}" autocomplete="off" name="ruc"
                           class="form-control"
                           type="text" placeholder="Ruc de la empresa">
                </div>
								</div>
								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="telfono">Telefono</label>
                    <input required maxlength="255" value="{{$empresa->telefono}}" autocomplete="off" name="telefono"
                           class="form-control"
                           type="text" placeholder="Telefono de la empresa">
                </div>
								</div>
								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input maxlength="255" value="{{$empresa->correo}}" autocomplete="off" name="correo"
                           class="form-control"
                           type="text" placeholder="Correo de la empresa">
                </div>
								</div>
								<div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input unique maxlength="100" value="{{$empresa->descripcion}}" autocomplete="off" name="descripcion"
                           class="form-control"
                           type="text" placeholder="descripcion">
                </div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label for="latidud">Latitud</label>
										<input type="text" value="{{$empresa->latitud}}" id="latitud" name="latitud" value="" class="form-control"
										placeholder="Ingrese su latitud">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="longitud">Longitud</label>
										<input type="text" value="{{$empresa->longitud}}" id="longitud" name="longitud" value="" class="form-control"
										placeholder="Ingrese su longitud">
									</div>
								</div>
				<label for="longitud">Mover el marcador para cambiar la ubicación de su local</label>
					<div class="col-md-12">
						<div class="" id="mapa" style="width: 100%; height:500px"></div>
					</div>


				<script type="text/javascript">
					function iniciarMapa(){
						var latitud = -27.359391894383084;
						var longitud = -55.84904911875535;

						coordenadas = {
							lng: longitud,
							lat: latitud
						}

						generarMapa(coordenadas);
					}

					function generarMapa(coordenadas){
						var mapa = new google.maps.Map(document.getElementById('mapa'),
						{
								zoom:18,
								center: new google.maps.LatLng(coordenadas.lat,coordenadas.lng)
						});

						marcador = new google.maps.Marker({
							map: mapa,
							draggable: true,
							position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
						});

						marcador.addListener('dragend', function(event){
							document.getElementById("latitud").value = this.getPosition().lat();
							document.getElementById("longitud").value = this.getPosition().lng();
						})
					}

				</script>

				<script src="https://maps.googleapis.com/maps/api/js?Key=AIzaSyCo4LRSwMXoWZhaq-7YmGBhggYihH4ZzZE&callback=iniciarMapa">
				 </script>



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
