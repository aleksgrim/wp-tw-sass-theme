let mix = require('laravel-mix')

mix.options({
    processCssUrls: false
});

mix.sass('src/styles/styles.sass', 'dist/styles/styles.css')
mix.js('src/js/scripts.js', 'dist/js/scripts.min.js')
