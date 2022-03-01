var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('cms/cms.layout.scss', 'public/assets/css/cms');
    mix.sass('frontend/main.scss', 'public/assets/css/frontend');
    mix.scripts(['cms/vendor/hallo.js', 'cms/vendor/jquery.slug.js', 'cms/vendor/rangy-core.js', 'cms/vendor/showdown.min.js', 'cms/vendor/to-markdown.js', 'cms/main.js'], 'public/assets/js/cms');
});
