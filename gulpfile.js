var gulp = require('gulp'),
sass = require('gulp-sass'),
cleanCSS = require('gulp-clean-css'),
rename = require("gulp-rename"),
plumber = require('gulp-plumber'),
gutil = require('gulp-util'),
notify = require('gulp-notify');

//var connect = require('gulp-connect');

var config = {
    publicDir: './css',
    sassDir: './production/sass/'
}
//keeps gulp from crashing for scss errors & gives sass access to bootstrap
gulp.task('sass', function() {
    gulp.src( config.sassDir + '*.scss')
        .pipe(plumber({ errorHandler: function(err) {
            notify.onError({
                title: "Gulp error in " + err.plugin,
                message:  err.toString()
            })(err);

            // play a sound once
            gutil.beep();
        }})) 
        .pipe(sass())
        .pipe(gulp.dest(config.publicDir));
});

gulp.task('cssmin', function(){
    gulp.src(config.publicDir + '/app.css')
        .pipe(plumber({ errorHandler: function(err) {
            notify.onError({
                title: "Gulp error in " + err.plugin,
                message:  err.toString()
            })(err);

            // play a sound once
            gutil.beep();
        }})) 
        .pipe(cleanCSS())
        .pipe(rename({
            suffix: '.min'
          }))
        .pipe(gulp.dest(config.publicDir));
});

gulp.task('watch', function() {
    gulp.watch(config.sassDir + '*.scss', ['sass']);
    gulp.watch(config.publicDir + '/app.css', ['cssmin']);
});

gulp.task('default', ['sass', 'watch']);