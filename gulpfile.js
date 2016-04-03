var gulp 	= 	require('gulp');
var sass 	=	require('gulp-sass');
var concat 	= 	require('gulp-concat');

gulp.task('sass', function(){
	return gulp.src('assets/sass/site.scss')
		.pipe(sass())
		.pipe(gulp.dest('web/css/'))
});

