var gulp    = require('gulp'),
    uglify  = require('gulp-terser'),
    rename  = require('gulp-rename'),
    sass    = require('gulp-sass'),
    csso    = require('gulp-csso');

gulp.task('styles', function() {
    return gulp.src('assets/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(csso())
        .pipe(rename({suffix:'.min'}))
        .pipe(gulp.dest('assets/css'));
});

gulp.task('scripts', function(){
    gulp.src(['assets/scripts/**/*.js', '!assets/scripts/**/*min.js'])
    .pipe(rename({suffix:'.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('assets/js'));
});

gulp.task('default',function() {
    gulp.watch('assets/scripts/**/*.js', ['scripts']);
    gulp.watch('assets/scss/**/*.scss',['styles']);
});

