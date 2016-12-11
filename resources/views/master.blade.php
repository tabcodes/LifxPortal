<html>

<head>
    {!! Html::style('css/style.css') !!}
    {!! Html::script('js/main.js') !!}

    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="container-fluid" id="main">
        <header>
            <div class="row">
                <div class="header-text col-md-offset-1 col-md-3">
                    <span class="normal-weight">Light</span><span class="bold-weight">Portal</span>
                </div>
                <div class="col-md-6 nav-container">
                    <nav>

                    </nav>
                </div>
        </header>
        </div>
    </div>
    <div class="container-fluid">

        @yield('content')

    </div>

</body>


</html>
