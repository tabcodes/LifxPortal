<html>
  <head>
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
     {!! Html::script('js/main.js') !!}


    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body>
    <header>
      <nav>

      </nav>
    </header>
    <div class="container-fluid">

    @yield('content')

  </div>

  </body>


</html>
