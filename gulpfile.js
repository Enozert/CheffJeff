const gulp = require('gulp');
const {watch} = require('gulp');
const sass = require('gulp-sass');
const webpack_stream = require('webpack-stream');

compileCss = ()=> {
  return gulp.src('./src/sass/pages/*.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('./dist/style'));
}

bundleTask = ()=> {
  return webpack_stream({
    entry: {
      home: './src/javaScript/pages/home.js',
      about: './src/javaScript/pages/about.js',
      skills: './src/javaScript/pages/skills.js',
      services: './src/javaScript/pages/services.js',
      projects: './src/javaScript/pages/projects.js',
      contact: './src/javaScript/pages/contact.js',
    },
    mode: 'production',
    output: {
      filename: '[name].js'
    }
  }).pipe(gulp.dest('./dist/js'));
}

defaultTask = ()=> {
  watch('./src/javaScript/**/*.js', bundleTask);
  watch('./src/sass/**/*.scss', compileCss);
}

exports.default  = defaultTask;
exports.compile  = compileCss;
exports.bundleJS = bundleTask;