<!doctype html>
<html lang="es">
  <head>
    @section('head')
      @include('layouts.headGeneral')
    @show

    <title>@yield('title', 'Projecte Vota')</title>
  </head>
  <body>

    @include('layouts.cabecera')

    @section('menu')
      @include('layouts.menu')
    @show
    
    <div id="divCentral">
      <div>
        <div id="contenido">
          @yield('content')
        </div>
      </div>
    </div>

    @include('layouts.pieDePagina')
  </body>
</html>