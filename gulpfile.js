const elixir = require('laravel-elixir');

//require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

 elixir(function(mix) {
     mix.sass([
             'spectrum.css',
             'rangeslider.css',
             'select2.min.css',
         ],
         'public/css/lights.css');

      mix.sass([
        'bootstrap.min.css',
        'font-awesome.min.css',
        'ionicons.min.css',
        'app.scss',
      ], 'public/css/req.css')

     mix.scripts([
             'spectrum.js',
             'rangeslider.js',
             'select2.min.js',
             'jquery-knob-min.js',
             'lightcontrols.js',
         ],
         'public/js/lights.js');

    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'site.js',
      ], 'public/js/req.js')
 });
