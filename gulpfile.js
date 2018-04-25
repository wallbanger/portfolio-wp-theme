var gulp = require('gulp'),
    browserSync = require('browser-sync'),
    sass = require('gulp-sass'),
    prefix = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    gutil = require('gulp-util'),
    plumber = require('gulp-plumber');

gulp.task('browser-sync', ['sass'], function() {
  browserSync({
    server: {
      baseDir: './'
    }
  });
});

/* Js */
gulp.task('jsConcat', function() {
  return gulp.src([
    '_source/js/lib/*',
    '_source/js/vendor/*',
    '_source/js/common/*'
  ])
      .pipe(concat('all.min.js'))
      .pipe(gulp.dest('assets/js'));
});

gulp.task('jsMin', ['jsConcat'], function() {
  return gulp.src(['assets/js/all.min.js'])
      .pipe(plumber(function(error) {
        gutil.log(gutil.colors.red(error.message));
        this.emit('end');
      }))
      .pipe(uglify())
      .pipe(gulp.dest('assets/js'));
});

gulp.task('sass', function () {
  return gulp.src([
    '_source/scss/main.scss'
  ])
      .pipe(plumber(function(error) {
        gutil.log(gutil.colors.red(error.message));
        this.emit('end');
      }))
      .pipe(sass({
        includePaths: ['scss'],
        outputStyle: 'compressed',
        onError: browserSync.notify
      }))
      .pipe(prefix(['last 2 versions', '> 1%'], { cascade: true }))
      .pipe(gulp.dest('assets/css'))
      .pipe(browserSync.reload({stream:true}))
      .pipe(gulp.dest('assets/css'));
});

gulp.task('watch', ['jsMin', 'browser-sync'], function () {
  gulp.watch([
    '_source/**/*.scss'
  ], ['sass']);
  gulp.watch([
    '_source/js/lib/*.js',
    '_source/js/common/*.js',
    '_source/js/vendor/*.js'
  ], ['jsMin']);
});

gulp.task('default', ['sass', 'jsMin']);
