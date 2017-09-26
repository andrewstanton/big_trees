var gulp = require('gulp');
var sass = require('gulp-sass');
//var connect = require('gulp-connect');

var config = {
    publicDir: './',
    sassDir: './production/sass/'
}

//keeps gulp from crashing for scss errors & gives sass access to bootstrap
gulp.task('sass', function() {
    return gulp.src( config.sassDir + '*.scss')
        .pipe(sass({ 
            errLogToConsole: true
        }))
        .pipe(gulp.dest(config.publicDir + 'css'));
});

gulp.task('watch', function() {
    gulp.watch(config.sassDir + '*.scss', ['sass']);
});

gulp.task('default', ['sass', 'watch']);