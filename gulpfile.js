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
             'bootstrap.min.css',
             'spectrum.css',
             'font-awesome.min.css',
             'rangeslider.css',
             'select2.min.css',
             'app.scss',
         ],
         'public/css/style.css');

     mix.scripts(['jquery.min.js',
             'bootstrap.min.js',
             'liga.js',
             'spectrum.js',
             'rangeslider.js',
             'select2.min.js',
             'jquery-knob-min.js',
             'app.js',
         ],
         'public/js/main.js');
 });
