// Dependencies
var gulp = require('gulp'),
    // CSS stuff
    sass = require('gulp-sass'),
    autoprefix = require('gulp-autoprefixer'),
    minify = require('gulp-minify-css'),
    // Javascript stuff
    uglify = require('gulp-uglify'),
    strip = require('gulp-strip-debug'),
    concat = require('gulp-concat'),
    // Images
    imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache'),
    // Other
    util = require('gulp-util'),
    del = require('del'),
    notify = require('gulp-notify');

// Assets
var paths = {
    assets: {
        styles: {
            dir: 'assets/styles',
            files: 'assets/styles/**/*.scss'
        },
        scripts: {
            dir: 'assets/scripts/',
            files: 'assets/scripts/**/*.js'
        },
        images: {
            dir: 'assets/images',
            files: 'assets/images/**/*'
        }
    },
    public: {
        styles: 'public/styles',
        scripts: 'public/scripts',
        images: 'public/images',
        del: [
            'public/styles/*',
            'public/scripts/*',
            'public/images/*'
        ]
    }
}

/**
 * Styles task
 * ===========
 * Grabs everything inside the styles & sprites directories, concantinates
 * and compiles scss, builds sprites, and then outputs them to their
 * respective target directories.
 */
gulp.task('styles', function() {
    gulp.src(paths.assets.styles.files)
        .pipe(sass())
        .pipe(autoprefix('last 4 version'))
        .pipe(gulp.dest(paths.public.styles))
        .pipe(notify('Styles task complete.'));
});

/**
 * Scripts task
 * ============
 * Grabs everything inside the scripts directory, concantinates and minifies,
 * and then outputs them to the target directory.
 */
gulp.task('scripts', function() {
    gulp.src(paths.assets.scripts.files)
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest(paths.public.scripts))
        .pipe(notify('Scripts task complete.'));
});

/**
 * Images task
 * ===========
 * Grabs everything inside the img directory, optimises each image,
 * and then outputs them to the target directory.
 */
gulp.task('images', function() {
    gulp.src(paths.assets.images.files)
        .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
        .pipe(gulp.dest(paths.public.images));
});

/**
 * Cleaner task
 * ============
 * This simply deletes all of the main assets folders.
 */
gulp.task('clean', function(x) {
    del(paths.public.del, x);
});

/**
 * Cache clearing task
 * ===================
 * Destroy the cache so that image name changes take effect etc
 */
gulp.task('cache', function() {
    cache.clearAll();
});

/**
 * Watch task
 * ==========
 * Watches the different directores for changes and then
 * runs their relevant tasks and livereloads.
 */
gulp.task('watch', function() {
    // Run the appropriate task when assets change
    gulp.watch(paths.assets.styles.files, ['styles']);
    gulp.watch(paths.assets.scripts.files, ['scripts']);
    gulp.watch(paths.assets.images.files, ['images']);
});

/**
 * Deploy task
 * ===========
 * Runs all of the main tasks while minifying/uglifying everything.
 */
gulp.task('deploy', ['clean'], function() {
    // Styles
    gulp.src(paths.assets.styles.files)
        .pipe(sass())
        .pipe(autoprefix('last 4 version'))
        .pipe(minify())
        .pipe(gulp.dest(paths.public.styles));

    // Scripts
    gulp.src(paths.assets.scripts.files)
        .pipe(concat('main.min.js'))
        .pipe(strip())
        .pipe(uglify())
        .pipe(gulp.dest(paths.public.scripts));

    // Images
    gulp.start('images');
});

/**
 * Default task
 * ============
 * Runs every task, and then watches files for changes.
 */
gulp.task('default', ['clean'], function() {
    gulp.start('styles', 'scripts', 'images', 'watch');
});
