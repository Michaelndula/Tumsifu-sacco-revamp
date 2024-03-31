const mix = require('laravel-mix');

mix.js('resources/js/app.jsx', 'public/js')
   .sass('resources/css/styles.scss', 'public/css');