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
    mix.sass('app.scss')
        .publish(
            'jquery/dist/jquery.min.js',
            'public/js/jquery.min.js'
        )
        .publish(
            'jquery.cookie/jquery.cookie.js',
            'public/js/jquery.cookie.js'
        )
        .publish(
            'exif-js/exif.js',
            'public/js/exif.js'
        )
        .publish(
            'angular/angular.min.js',
            'public/js/angular.min.js'
        )
        .scripts([
            'js/jquery.min.js',
            'js/jquery.cookie.js',
            'js/angular.min.js',
            'js/s3.jquery.fine-uploader.min.js',
            'js/exif.js',
            'js/app.js'
        ])
        .styles([
            'css/app.css'
        ])
});
