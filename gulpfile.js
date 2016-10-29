var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var themedir = './wp-content/themes/englishdept/';

gulp.task('default', ['sass'], function () {
	gulp.watch(themedir + 'sass/*.scss', ['sass']);
});

gulp.task('sass', function () {
	gulp.src(themedir + 'sass/**/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(cleanCSS())
		.pipe(gulp.dest(themedir + 'css'));
});