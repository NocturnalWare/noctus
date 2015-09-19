var elixir = require('laravel-elixir');

    config = {
        nodeDir: "./node_modules"
    };

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
    mix.sass('app.scss');
    mix.browserify(['main.js', 'vue.min.js', 'jquery.min.js', 'bootstrap.min.js']);
});
