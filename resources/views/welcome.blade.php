<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Encontralo</title>
        <link rel="icon" href="{{asset('img/e.ico')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <!--estilos para normalizar css-->
        <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
        <!-- estilos personalizados para la pagina de bienvenida-->
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">

        <!-- estilos animador para la pagina de bienvenida-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>    
    </head>
<body>
<div class="flex-center full-height">
            <div class="title m-b-md animate__animated animate__shakeY">
                <img id="logo" src="{{asset('img/e.png')}}"><b>Encontralo!!</b>
            </div>
            
</div>
<header class="header">
<nav class="nav-big" id="navbar">
    <div class="nav-logo">
        <img class="img-nav-logo" src="{{asset('img/e.png')}}">
    </div>
    <div class="nav-principal">
            <a href="#ancla-1">Quienes somos</a>
            <a href="#ancla-2">Empresas</a>
            <a href="#ancla-4">Contacto</a>
    </div>
    <div class="nav-registro1">
                @if (Route::has('login'))
                <div class="nav-registro1">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                    <div class="nav-registro">
                        <a href="{{ route('login') }}">Ingresar</a>
                    </div>
                    @if (Route::has('register'))
                    <div class="nav-registro">
                        <a href="{{ route('register') }}">Registrarse</a>
                    @endif
                    </div>
                    @endauth
                </div>
                @endif
    </div>
                   
</nav>
</header>
<article>
<section class="quienes">
<a name="ancla-1" >
<h2 class="uno">Quienes somos</h2>
<div class="cont"> <img id="img2" src="{{asset('img/encuentra.jpg')}}">
<p>soy un parrafo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Soy un parrafo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

</section>
<section class="empresa">
<a name="ancla-2">
<h2 class="uno">Empresas</h2>
    <div class="image-container">
        <img class="img-empresa" src="https://images.unsplash.com/photo-1511300636408-a63a89df3482?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Zm9uZG9zJTIwZGUlMjBwYW50YWxsYSUyMGRlJTIwYWx0YSUyMGRlZmluaWNpJUMzJUIzbiUyMGNvbXBsZXRhfGVufDB8fDB8fA%3D%3D&w=1000&q=80">
        <h1>Lorem ipsum dolor sit amet.</h1>
    </div>
    <div class="image-container">
        <img class="img-empresa" src="https://images.pexels.com/photos/977304/pexels-photo-977304.jpeg?cs=srgb&dl=pexels-irina-iriser-977304.jpg&fm=jpg">
	    <h1>Lorem ipsum dolor sit amet.</h1>
    </div>
    <div class="image-container">
        <img class="img-empresa" src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/high-resolution-desktop-wallpapers-design-template-df816cd5a9d5a7cc2d15aa71696d5d61_screen.jpg?ts=1645777640">
	    <h1>Lorem ipsum dolor sit amet.</h1>
    </div>
    <div class="image-container">
        <img class="img-empresa" src="https://i0.wp.com/www.puntogeek.com/wp-content/uploads/2012/03/mariomoreno_4.jpg">
	    <h1>Lorem ipsum dolor sit amet.</h1>
    </div>
    <div class="image-container">
        <img class="img-empresa" src="https://fondosmil.com/fondo/7997.jpg">
        <h1>Lorem ipsum dolor sit amet.</h1>
    </div>
    <div class="image-container">
        <img class="img-empresa" src="https://fondosmil.com/fondo/7998.jpg">
	    <h1>Lorem ipsum dolor sit amet.</h1>
    </div>
    <div class="image-container">
        <img class="img-empresa" src="https://c4.wallpaperflare.com/wallpaper/83/500/871/waterfall-high-resolution-desktop-wallpaper-preview.jpg">
	    <h1>Lorem ipsum dolor sit amet.</h1>
    </div>
    <div class="image-container">
        <img class="img-empresa" src="https://p4.wallpaperbetter.com/wallpaper/288/303/761/wave-high-resolution-wallpaper-preview.jpg">
	    <h1>Lorem ipsum dolor sit amet.</h1>
    </div>
</section>
<section class="contacto">
<a name="ancla-4">
<h2 class="uno">Contactos</h2>
<div class="form-flex">
        <form action="" id="myForm">
            <div class="form__section">
                <label for="myInput">Nombre
                <input type="text" id="myInput" class="form__input">
                <span id="myError" class="error"></span></label>
            </div>
            <div class="form__section">
                <label for="">Email
                <input type="email" id="email" class="form__input">
                <span id="mensajeError2" class="error"></span> <span id="mensajeError22" class="error"></span></label>
            </div>
            <div class="form__section">
                <label for="">Mensaje
                <textarea class="form__input" id="mensaje" placeholder="Escriba su mensaje"></textarea>
                <span id="mensajeError4"></span><span id="mensajeError44"></span></label>
            </div>
        
            <div class="form__section">
                <button type="submit" class="boton2">Enviar</button>
            </div>
        </form>
        </div>
</article>

    
        <footer class="main-footer footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Encontralo un sistema rapido para la busqueda de Productos.
      </footer>
      <script src="{{asset('js/javascript.js')}}"></script>

</body>
</html>
