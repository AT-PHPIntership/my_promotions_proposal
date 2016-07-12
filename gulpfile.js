var gulp = require('gulp');
var elixir = require('laravel-elixir');

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

/**
 * Default gulp is to run this elixir stuff
 */
elixir(function(mix) {

  // Combine scripts
  mix.scripts([
      'gentelella/vendors/jquery/dist/jquery.min.js',
      'gentelella/vendors/bootstrap/dist/js/bootstrap.min.js',
      'gentelella/vendors/fastclick/lib/fastclick.js',
      'gentelella/vendors/nprogress/nprogress.js',
      'gentelella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
      'gentelella/build/js/custom.min.js',
      'sweetalert/dist/sweetalert.min.js',
      'datatables.net/js/jquery.dataTables.min.js'
    ],
    'public/backend/js/vendor.js',
    'vendor/bower_dl'
  );

  // Compile css
  mix.styles([
  	  'gentelella/vendors/bootstrap/dist/css/bootstrap.min.css',
      'gentelella/vendors/font-awesome/css/font-awesome.min.css',
      'gentelella/vendors/iCheck/skins/flat/green.css',
      'gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
      'gentelella/build/css/custom.min.css',
      'sweetalert/dist/sweetalert.css',
      'datatables.net-dt/css/jquery.dataTables.min.css'
  ], 
    'public/backend/css/vendor.css',
    'vendor/bower_dl'
  );
});
