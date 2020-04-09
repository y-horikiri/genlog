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

mix.copy('resources/js/app.js', 'public/js')
    .copy('resources/js/bootstrap.js', 'public/js')
    .copy('resources/js/const.js', 'public/js')
    .copy('resources/js/DefGauge.js', 'public/js')
    .copy('resources/js/newgear.js', 'public/js')
    .copy('resources/js/newstring.js', 'public/js')
    .copy('resources/js/util.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/index.scss', 'public/css')
    .sass('resources/sass/newstring.scss', 'public/css')
    .sass('resources/sass/newgear.scss', 'public/css')
;
