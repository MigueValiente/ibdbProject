const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .js('resources/js/validaciones/bookValidation.js', 'public/js/validaciones/')
   .js('resources/js/validaciones/registerValidation.js', 'public/js/validaciones/')
   .js('resources/js/validaciones/validacionRegistro.js', 'public/js/validaciones/')
   .js('resources/js/navs.js', 'public/js/');
