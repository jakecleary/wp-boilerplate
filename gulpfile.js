var gulp = require('gulp'),
    // CSS stuff
    compass = require('gulp-compass'),
    autoprefix = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    // Javascript stuff
    uglify = require('gulp-uglify'),
    strip = require('gulp-strip-debug'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    // Images
    imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache'),
    // Other
    util = require('gulp-util'),
    clean = require('gulp-clean'),
    notify = require('gulp-notify'),
    // Live reload
    livereload = require('gulp-livereload'),
    lr = require('tiny-lr'),
    server = lr(),
    // Assets
    assetsDir = 'assets/',
    // Scss
    scssDir = 'assets/styles',
    targetCssDir = 'public/styles',
    // Javascripts
    jsDir = 'assets/js',
    targetJsDir = 'public/js',
    // Images
    imgDir = 'assets/img/**/*',
    targetImgDir = 'public/img',
    // Sprites
    spriteDir = 'assets/sprites',
    targetSpriteDir = 'public/sprites';

//
// Compass/Scss task
// -----------------
// Grabs everything inside the styles & sprites directories, concantinates
// and compiles scss, builds sprites, and then outputs them to their
// respective target directories.
//
gulp.task('compass', function() {
    gulp.src(scssDir + '/**/*.scss')
        .pipe(compass({
            config_file: './config.rb',
            sass: scssDir,
            css: targetCssDir,
            image: spriteDir
        }))
        .pipe(autoprefix('last 4 version'))
        .pipe(gulp.dest(targetCssDir));
});

//
// Javascript task
// ---------------
// Grabs everything inside the js directory, concantinates and minifies,
// and then outputs them to the target directory.
//
gulp.task('js', function() {
    gulp.src([jsDir + '/main.js', jsDir + '/**/*.js'])
        .pipe(concat('main.min.js'))
        .pipe(strip())
        .pipe(uglify())
        .pipe(gulp.dest(targetJsDir));
});

//
// Image task
// ----------
// Grabs everything inside the img directory, optimises each image,
// and then outputs them to the target directory.
//
gulp.task('img', function() {
    gulp.src(imgDir)
        .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
        .pipe(gulp.dest(targetImgDir));
});

//
// Cleaner task
// ------------
// This simply deletes everything inside /public.
//
gulp.task('clean', function() {
  return gulp.src([targetCssDir, targetJsDir, targetImgDir, targetSpriteDir], {read: false})
    .pipe(clean());
});

//
// Watch task
// ----------
// Watches the different directores for changes and then
// runs their relevant tasks and livereloads.
//
gulp.task('watch', function() {
    gulp.watch(scssDir + '/**/*.scss', ['compass']);
    gulp.watch(jsDir + '/**/*.js', ['js']);
    gulp.watch(imgDir + '/**/*', ['img']);
    gulp.watch(spriteDir + '/**/*', ['compass']);
    var server = livereload();
    gulp.watch('*').on('change', function(file) {
        server.changed(file.path);
    });
});

//
// Deploy task
// -----------
// Runs all of the main tasks, without activating livereload.
//
gulp.task('deploy', ['clean'], function() {
    gulp.start('compass', 'js', 'img');
});

//
// Defualt task
// ------------
// Runs every task, and then watches files for changes.
//
gulp.task('default', ['clean'], function() {
    gulp.start('compass', 'js', 'img', 'watch');
});
