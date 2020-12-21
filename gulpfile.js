const gulp = require('gulp');
const sass = require('gulp-sass');
// const webpack = require('webpack');
const webpack_stream = require('webpack-stream');
// const gPrint = require('gulp-print');
// const gUntil = require('gulp-until');
// const del = require('del');
// const vinylPaths = require('vinyl-paths');
// const minify = require('gulp-uglify');
// const babel = require('gulp-babel');
// const concat = require('gulp-concat');

gulp.task('sass', function() {
  return gulp.src('./src/sass/pages/*.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('./dist/style'));
});

gulp.task('bundleJS', function() {
  return gulp.src('./src/javaScript/pages/home.js')
    .pipe(webpack_stream({
      output: {
        filename: 'home.js'
      }
    }))
    .pipe(gulp.dest('./dist/js'));
});

gulp.task('default', function() {
  // watch('./src/javaScript/pages/*.js', bundleJS);
  // watch('./src/sass/pages/*.scss', sass);
});