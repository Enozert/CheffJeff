const gulp = require('gulp');
const sass = require('gulp-sass');
// const minify = require('gulp-uglify');
// const babel = require('gulp-babel');
// const concat = require('gulp-concat');

gulp.task('sass', function() {
  return gulp.src('./src/sass/pages/*.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('./dist/style'));
});

gulp.task('default', function() {
  // watch('./src/javaScript/pages/*.js', bundleJS);
  // watch('./src/sass/pages/*.scss', sass);
});