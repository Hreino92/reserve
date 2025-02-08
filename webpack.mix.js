const mix = require('laravel-mix');

// Si estás usando Sass
//mix.sass('resources/sass/app.scss', 'public/css')
  // .js('resources/js/app.js', 'public/js')
   //.sourceMaps();

//O si estás usando CSS
mix.css('resources/css/app.css', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .sourceMaps();
