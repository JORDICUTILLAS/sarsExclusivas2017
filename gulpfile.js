var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
const imagemin = require('gulp-imagemin');
const pngquant = require('imagemin-pngquant');
var ghPages = require('gulp-gh-pages');
var validator = require('gulp-html')

gulp.task('css', function(){
	return gulp.src('src/sass/styles.scss')
		.pipe(sass())
		.pipe(autoprefixer({ 
			browsers: ['last 2 versions',
            '>1%',
            'ie 9'
            ]
        }))
		.pipe(gulp.dest('dist/css'));	
});

gulp.task('image', () => {
	return gulp.src('src/img/*')
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [pngquant()]
		}))
		.pipe(gulp.dest('dist/img'));
});

gulp.task('deploy', function() {
  return gulp.src('./dist/**/*')
    .pipe(ghPages());
});

gulp.task('html', function() {
  return gulp.src('src/**/*.html')  
  .pipe(gulp.dest('dist/'));
});

gulp.task('pages', function() {
  return gulp.src('src/**/*.php')
    .pipe(gulp.dest('dist/'));
});

gulp.task('js', function() {
  return gulp.src('src/js/**/*.js')
    .pipe(gulp.dest('dist/js'));
});


gulp.task('default', ['css', 'html', 'pages', 'js'], function(){
	gulp.watch('src/sass/**/*.scss',['css']);
	gulp.watch('src/**/*.html',['html']);
	gulp.watch('src/**/*.php',['pages']);
	gulp.watch('src/js/**/*.js',['js']);
});