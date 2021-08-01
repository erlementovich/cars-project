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

mix
    .options({
        processCssUrls: false
    })
    .sass('resources/assets/scss/app.scss', 'public/assets/css')
    .sourceMaps()
    .sass('resources/assets/scss/main.scss', 'public/assets/css')
    .sourceMaps()
    .sass('resources/assets/scss/inner.scss', 'public/assets/css')
    .sourceMaps()
    .js('resources/assets/js/main.js', 'public/assets/js')
    .sourceMaps()
    .js('resources/assets/js/product.js', 'public/assets/js')
    .sourceMaps()
    .copyDirectory('resources/assets/fonts', 'public/assets/fonts')
    .copyDirectory('resources/assets/images', 'public/assets/images')
    .copyDirectory('resources/assets/pictures', 'public/assets/pictures')
