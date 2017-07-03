// Load plugins
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    cache = require('gulp-cache'),
    notify = require('gulp-notify'),
    browserSync = require('browser-sync').create();

// Browser-sync
gulp.task('serve', function() {
    browserSync.init({
      proxy: 'http://localhost/game_zone/'
    });
});

// Styles
gulp.task('styles', function() {
  return gulp.src('scss/style.scss')
    .pipe(sass({ style: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifycss())
    .pipe(gulp.dest('css'))
    .pipe(notify({ message: 'Styles task complete' }))
    .pipe(browserSync.reload({stream: true}));
});

// Scripts
gulp.task('scripts', function() {
  return gulp.src(['./js/**/*.js', '!js/**/*.min.js'])
    .pipe(concat('main.js'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest('js'))
    .pipe(notify({ message: 'Scripts task complete' }))
    .pipe(browserSync.reload({stream: true}));
});

// Images
// gulp.task('images', function() {
//   return gulp.src('src/images/**/*')
//     .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
//     .pipe(livereload(server))
//     .pipe(gulp.dest('dist/images'))
//     .pipe(notify({ message: 'Images task complete' }));
// });
//
// // Clean
// gulp.task('clean', function() {
//   return gulp.src(['dist/styles', 'dist/scripts', 'dist/images'], {read: false})
//     .pipe(clean());
// });

// Watch
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('scss/**/*.scss', gulp.parallel('styles'));

  // Watch .js files
  gulp.watch(['./js/**/*.js', '!js/**/*.min.js'], gulp.parallel('scripts'));

  // Watch image files
  // gulp.watch('src/images/**/*', function(event) {
  //   console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  //   gulp.run('images');
  // });

});

// Default task
gulp.task('default', gulp.series('styles', 'scripts', gulp.parallel('serve', 'watch')));
