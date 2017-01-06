<html>

<head>
  {!! Html::style('css/req.css') !!}
  {!! Html::script('js/req.js') !!}
  <title>LightPortal</title>
    @if(isset($lightBox))
      {!! Html::style('css/lights.css') !!}
      {!! Html::script('js/lights.js') !!}
    @endif


    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <div class="container-fluid" id="main">
        <header>
            <div class="row" id="navigation-row">
                <div class="header-text col-md-offset-1 col-sm-offset-1 col-md-3 col-sm-3">
                    <span class="normal-weight">Light</span><span class="bold-weight">Portal</span>
                </div>
                @if(Auth::check())
                  @include('partials.nav.user')
                @else
                @include('partials.nav.guest')
              @endif
        </header>
        </div>
    </div>
    <div class="container-fluid">

        @yield('content')

    </div>

</body>


</html>
