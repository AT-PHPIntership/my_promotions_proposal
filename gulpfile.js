var gulp = require('gulp');
var elixir = require('laravel-elixir');

/**
 * Default gulp is to run this elixir stuff
 */
elixir(function(mix) {

  // Combine scripts
  mix.scripts([
      'jquery/dist/jquery.js',
      'bootswatch-dist/js/bootstrap.js'
    ],
    'public/assets/frontend/js/bower.js',
    'vendor/bower_dl'
  );

  // Compile css
  mix.styles([
      'bootswatch-dist/css/bootstrap.min.css',
  ], 
  'public/assets/frontend/css/bower.css', 
  'vendor/bower_dl'
  );
});
