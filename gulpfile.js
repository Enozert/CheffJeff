const gulp = require('gulp');
const sass = require('gulp-sass');
// const concat = require('gulp-concat');

gulp.task('sass', function() {
  return gulp.src('./src/sass/pages/home.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('./dist/style'))
});

gulp.task('sass:watch', function() {
  gulp.watch('src/sass/**/*.scss', ['sass']);
});

// gulp.task('scripts', function() {
//   return gulp.src('./src/javaScript/pages/*.js')
//     .pipe(concat('home.js'))
//     .pipe(gulp.dest('./dist/js'));
// })

gulp.task('default', function() {
  gulp.start('sass');
});