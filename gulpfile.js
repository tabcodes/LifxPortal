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
     mix.sass(['app.scss',
             'bootstrap.min.css',
             'rangeslider.css',
             'font-awesome.min.css',
         ],
         'public/css/style.css');

     mix.scripts(['jquery.min.js',
              'rangeslider.min.js',
             'bootstrap.min.js',
             'app.js',
             'liga.js',
             'slideout.min.js'
         ],
         'public/js/main.js');
 });
