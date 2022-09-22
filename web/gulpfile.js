var gulp = require('gulp');
var ts = require("gulp-typescript");
var tsProject = ts.createProject("tsconfig.json");
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

gulp.task('sass', function () {
    return gulp.src('dev/scss/**/*.scss')
        .pipe(sass({
            includePaths: ['node_modules/normalize-scss/sass']
        }))
        .pipe(gulp.dest('dev/css'))
        .pipe(browserSync.reload({
            stream: true
        }))
});

gulp.task('browserSync', function () {
    browserSync.init({
        server: {
            baseDir: 'dev'
        },
    })
})

gulp.task('watch', ['browserSync', 'sass'/*, 'ts'*/], function () {
    //gulp.watch('dev/ts/**/*.ts', ['ts']);
    gulp.watch('dev/scss/**/*.scss', ['sass']);
    gulp.watch('dev/*.html', browserSync.reload);
});
/*
gulp.task("ts", function () {
    return tsProject.src()
        .pipe(tsProject())
        .js.pipe(gulp.dest("dev/js"))
        .pipe(browserSync.reload({
            stream: true
        }))
});
*/