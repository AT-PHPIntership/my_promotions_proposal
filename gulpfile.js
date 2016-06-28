var gulp = require('gulp');

/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */
gulp.task("copyfiles", function() {

  gulp.src("vendor/bower_dl/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css")
    .pipe(gulp.dest("public/assets/backend/css/"));

  gulp.src("vendor/bower_dl/gentelella/vendors/font-awesome/css/font-awesome.min.css")
    .pipe(gulp.dest("public/assets/backend/css/"));

  gulp.src("vendor/bower_dl/gentelella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css")
    .pipe(gulp.dest("public/assets/backend/css/"));

  gulp.src("vendor/bower_dl/gentelella/build/css/custom.min.css")
    .pipe(gulp.dest("public/assets/backend/css/"));

  gulp.src("vendor/bower_dl/gentelella/vendors/jquery/dist/jquery.min.js")
    .pipe(gulp.dest("public/assets/backend/js/"));

  gulp.src("vendor/bower_dl/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js")
    .pipe(gulp.dest("public/assets/backend/js/"));

  gulp.src("vendor/bower_dl/gentelella/vendors/fastclick/lib/fastclick.js")
    .pipe(gulp.dest("public/assets/backend/js/"));

  gulp.src("vendor/bower_dl/gentelella/vendors/nprogress/nprogress.js")
    .pipe(gulp.dest("public/assets/backend/js/"));

  gulp.src("vendor/bower_dl/gentelella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js")
    .pipe(gulp.dest("public/assets/backend/js/"));

  gulp.src("vendor/bower_dl/gentelella/build/js/custom.min.js")
    .pipe(gulp.dest("public/assets/backend/js/"));
});
