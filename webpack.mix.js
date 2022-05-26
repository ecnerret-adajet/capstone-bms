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

// mix.js('resources/js/app.js', 'public/js')
//     .vue()
//     .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'public/css/argon.css',
    'public/css/style.css'
], 'public/css/all.css')
.js([
	'resources/js/app.js',

    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    // 'node_modules/popper.js/dist/popper.js.map',
    // 'node_modules/bootstrap/dist/js/bootstrap.min.js',
    // 'public/vendor/chart.js/dist/Chart.min.js',
    // 'public/vendor/chart.js/dist/Chart.extension.js',
    'public/js/argon.js'
], 'public/js/all.js')
.vue()
.browserSync({
    proxy: 'http://127.0.0.1:8000'
});
// .browserSync('http://salesman.local');
