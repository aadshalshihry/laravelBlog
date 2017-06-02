
var elixir = require('laravel-elixir');

// Sass
// Susy install by bower
elixir(function(mix) {
    mix.sass([
        'app.scss'
    ], 'public/assets/css');
});
