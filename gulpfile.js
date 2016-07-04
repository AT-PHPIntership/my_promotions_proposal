var gulp = require('gulp');
var elixir = require('laravel-elixir');

/**
 * Default gulp is to run this elixir stuff
 */

elixir(function(mix) {

  // Combine scripts
  mix.scripts([

      'vendors/jquery/dist/jquery.min.js',
      'vendors/bootstrap/dist/js/bootstrap.min.js',
      'vendors/fastclick/lib/fastclick.js',
      'vendors/nprogress/nprogress.js',
      'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
      'build/js/custom.min.js'
    ],
    'public/backend/js/vendor.js',
    'vendor/bower_dl/gentelella'
  );

mix.scripts([

      'jquery/dist/jquery.js',
      'bootswatch-dist/js/bootstrap.js'
    ],
    'public/assets/frontend/js/bower.js',
    'vendor/bower_dl'
);

  // Compile css
  mix.styles([
      'vendors/bootstrap/dist/css/bootstrap.min.css',
      'vendors/font-awesome/css/font-awesome.min.css',
      'vendors/iCheck/skins/flat/green.css',
      'vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
      'build/css/custom.min.css'
  ], 
    'public/backend/css/vendor.css',
    'vendor/bower_dl/gentelella'
  );
  
   mix.styles([
      'bootswatch-dist/css/bootstrap.min.css',
  ], 
  'public/assets/frontend/css/bower.css', 
  'vendor/bower_dl'
  );
});
