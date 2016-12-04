<html>
  <head>
    {!! Html::style('css/style.css') !!} {!! Html::script('js/main.js') !!}

    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body>
    <header>
      <nav>

      </nav>
    </header>

    @yield('content')


  </body>


</html>
