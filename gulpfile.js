var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass([
        'app.scss'
    ], 'public/assets/css');
    mix.scripts(['app/app.js', 'app/controllers/books.js'], 'public/assets/js/app.js')
        .scripts([
            'vendor/angular/angular.js',
            'vendor/jquery/dist/jquery.js',
            'vendor/bootstrap/dist/js/bootstrap.js'
        ], 'public/assets/js/vendor.js');
});
