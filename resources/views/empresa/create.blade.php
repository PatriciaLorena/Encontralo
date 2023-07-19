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
  <h1>Agregarrrrr Empresa</h1>
    <form method="POST" action="{{route("empresa.store")}}">
      @csrf
</div>
<div class="row">
      <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
            <label>Nombre</label>
                <input id="nombreEmpresa" type="text" class="form-control @error('alpha') is-invalid @enderror"
                name="nombreEmpresa" value="{{ old('nombreEmpresa') }}" required maxlength="255"
                autocomplete="nombreEmpresa" placeholder="Ingrese el nombre de la empresa" autofocus>
                    @error('alpha')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                    @enderror
           </div>
       </div>

       <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
           <div class="form-group">
             <label>Direccion</label>
                 <input id="direccion" type="text" class="form-control @error('alpha') is-invalid @enderror"
                 name="direccion" value="{{ old('direccion') }}" required maxlength="255"
                 autocomplete="nombreEmpresa" placeholder="Ingrese la direccion de la empresa" autofocus>
                     @error('alpha')
                         <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                         </span>
                     @enderror
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
              <label>Ruc</label>
                  <input id="ruc" type="text" class="form-control @error('alpha') is-invalid @enderror"
                  name="ruc" value="{{ old('ruc') }}" required maxlength="255"
                  autocomplete="nombreEmpresa" placeholder="Ingrese el ruc de la empresa" autofocus>
                      @error('alpha')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                      @enderror
             </div>
         </div>

         <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
               <label>Telefono</label>
                   <input id="telefono" type="text" class="form-control @error('alpha') is-invalid @enderror"
                   name="telefono" value="{{ old('telefono') }}" required maxlength="255"
                   autocomplete="telefono" placeholder="Ingrese el telefono de la empresa" autofocus>
                       @error('alpha')
                           <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                       @enderror
              </div>
          </div>

          <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label>Correo</label>
                    <input id="correo" type="text" class="form-control @error('alpha') is-invalid @enderror"
                    name="correo" value="{{ old('correo') }}" maxlength="255"
                    autocomplete="correo" placeholder="Ingrese el correo de la empresa" autofocus>
                        @error('alpha')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
               </div>
           </div>
      <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label>Descripcion</label>
            <input   maxlength="200" autocomplete="descripcion" value="{{ old('descripcion') }}"
             name="descripcion" class="form-control"
            type="text" maxlength="200" placeholder="Ingrese su descripcion">
        </div>
      </div>



        <div class="col-md-5">
          <div class="form-group">
            <label for="latidud">Latitud</label>
            <input type="text" id="latitud" name="latitud" value="" class="form-control"
            placeholder="Ingrese su latitud">
          </div>
        </div>

        <div class="col-md-5">
          <div class="form-group">
            <label for="longitud">Longitud</label>
            <input type="text" id="longitud" name="longitud" value="" class="form-control"
            placeholder="Ingrese su longitud">
          </div>
        </div>
<label><h4><b>&nbsp;&nbsp;&nbsp;&nbsp;Mover el marcador para guardar la ubicación de su local</b></h4></label>
  <div class="col-md-12">
    <div class="" id="mapa" style="width: 90%; height:500px"></div>
  </div>


  <script>


var marker;          //variable del marcador
var coords = {};    //coordenadas obtenidas con la geolocalización

//Funcion principal
initMap = function ()
{

    //usamos la API para geolocalizar el usuario
        navigator.geolocation.getCurrentPosition(
          function (position){
            coords =  {
              lng: position.coords.longitude,
              lat: position.coords.latitude
            };
            setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
            //console.log(coords)
            //carga las coordenadas en el input con id coords
            document.getElementById("latitud").value = coords.lat;
            document.getElementById("longitud").value = coords.lng;

          },function(error){console.log(error);});

}



function setMapa (coords)
{
      //Se crea una nueva instancia del objeto mapa
      var map = new google.maps.Map(document.getElementById('mapa'),



      {
        zoom: 15,
        center:new google.maps.LatLng(coords.lat,coords.lng),

      });

      //Creamos el marcador en el mapa con sus propiedades
      //para nuestro obetivo tenemos que poner el atributo draggable en true
      //position pondremos las mismas coordenas que obtuvimos en la geolocalización
      marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(coords.lat,coords.lng),

      });
      //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica
      //cuando el usuario a soltado el marcador
      marker.addListener('click', toggleBounce);

      marker.addListener( 'dragend', function (event)
      {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
       // document.getElementById("coords").value = this.getPosition().lat()+","+ this.getPosition().lng();
       
       document.getElementById("latitud").value = this.getPosition().lat();
       document.getElementById("longitud").value = this.getPosition().lng();

      });
}

//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

// Carga de la libreria de google maps

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>


<!--
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
-->
 

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
