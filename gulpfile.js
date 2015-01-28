// Dependencies
// ============

var gulp = require('gulp'),

    // Styles
    sass = require('gulp-sass'),
    autoprefix = require('gulp-autoprefixer'),
    minify = require('gulp-minify-css'),
    rename = require('gulp-rename'),

    // Scripts
    uglify = require('gulp-uglify'),
    strip = require('gulp-strip-debug'),
    concat = require('gulp-concat'),

    // Images
    png = require('imagemin-optipng'),
    jpg = require('imagemin-jpegtran'),
    gif = require('imagemin-gifsicle'),
    cache = require('gulp-cache'),

    // Other
    util = require('gulp-util'),
    del = require('del'),
    bust = require('gulp-buster'),
    notify = require('gulp-notify'),
    notifier = require('node-notifier'),
    merge = require('merge-stream'),
    sequence = require('run-sequence');

// Assets
// ======

var paths = {
    assets: {
        styles: {
            dir: 'assets/styles',
            files: 'assets/styles/**/*.scss'
        },
        js: {
            dir: 'assets/js/',
            files: [
                'assets/js/vendor/**/*.js',
                'assets/js/src/**/*.js',
                'assets/js/main.js'
            ],
        },
        img: {
            dir: 'assets/img',
            files: 'assets/img/**/*',
            png: 'assets/img/**/*.png',
            jpg: 'assets/img/**/*.jpg',
            gif: 'assets/img/**/*.gif',
            svg: 'assets/img/**/*.svg',
            ico: 'assets/img/**/*.ico'
        }
    },
    public: {
        styles: 'public/styles',
        js: 'public/js',
        img: 'public/img'
    },
    hash: {
        dir: 'public/cache'
    }
}

// General Settings
// ================

var settings = {
    autoprefix: {
        versions: 'last 10 version'
    }
}

// Deployment
// ==========

var deployment = {

    // The files we want to deploy
    files: [
        '**/*',
        '!{assets,assets/**}',
        '!{templates,templates/**}',
        '!{node_modules,node_modules/**}',
        '!package.json',
        '!gulpfile.js',
        '!composer.json',
        '!composer.lock',
        '!README.md'
    ],

    // The folder to store them in
    destination: '_deploy'
}

// Styles
// ======
// Grabs everything inside the styles & sprites
// directories, concantinates and compiles scss,
// builds sprites, and then outputs them to their
// respective target directories.

gulp.task('styles', function() {
    return gulp.src(paths.assets.styles.files)
        .pipe(sass({sourceComments: 'normal'}))
        .pipe(autoprefix(settings.autoprefix.versions))
        .pipe(gulp.dest(paths.public.styles))
        .pipe(bust())
        .pipe(gulp.dest(paths.hash.dir));
});

// Scripts
// =======
// Grabs everything inside the js directory,
// concantinates and minifies, and then outputs
// them to the target directory.

gulp.task('scripts', function() {
    return gulp.src(paths.assets.js.files)
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest(paths.public.js))
        .pipe(bust())
        .pipe(gulp.dest(paths.hash.dir));
});

// Images
// ======
// Grabs everything inside the img directory,
// optimises each image, and then outputs them to
// the target directory.

gulp.task('images', function() {
    return gulp.src(paths.assets.img.files)
        .pipe(gulp.dest(paths.public.img));
});

// Cache-buster
// ============
// Completely clear the cache to stop image-min
// outputting oncorrect image names etc.

gulp.task('clear', function (done) {
    return cache.clearAll(done);
});

// Cleaner
// =======
// Deletes all the public asset folders.

gulp.task('clean', function(cb) {
    return del([
        paths.public.styles,
        paths.public.js,
        paths.public.img
    ], cb);
});

// Watcher
// =======
// Watches the different directores for changes and then
// runs their relevant tasks and livereloads.

gulp.task('watch', function() {
    // Run the appropriate task when assets change
    gulp.watch(paths.assets.styles.files, ['styles']);
    gulp.watch(paths.assets.js.files, ['scripts']);
    gulp.watch(paths.assets.img.files, ['images']);
});

// Production assets
// =================
// Goes through all our assets and readies them for production.
// - Minification
// - Concatenation
// - Debug stripping

gulp.task('production', ['clean'], function() {

    // Styles
    var styles = gulp.src(paths.assets.styles.files)
        .pipe(sass())
        .pipe(autoprefix(settings.autoprefix.versions))
        .pipe(minify())
        .pipe(gulp.dest(paths.public.styles))
        .pipe(bust())
        .pipe(gulp.dest(paths.hash.dir));

    // Scripts
    var scripts = gulp.src(paths.assets.js.files)
        .pipe(concat('main.min.js'))
        .pipe(strip())
        .pipe(uglify())
        .pipe(gulp.dest(paths.public.js))
        .pipe(bust())
        .pipe(gulp.dest(paths.hash.dir));

    // Compress all images.
    // We use seperate tasks for each file format as
    // there is an issue with the 'imagemin' bundle
    // and it's svg support.

    // PNGs
    var pngs = gulp.src(paths.assets.img.png)
        .pipe(png({optimizationLevel: 3})())
        .pipe(gulp.dest(paths.public.img));

    // JPGs
    var jpgs = gulp.src(paths.assets.img.jpg)
        .pipe(jpg({progressive: true})())
        .pipe(gulp.dest(paths.public.img));

    // GIFs
    var gifs = gulp.src(paths.assets.img.gif)
        .pipe(gif({interlaced: true})())
        .pipe(gulp.dest(paths.public.img));

    // SVGs
    var svgs = gulp.src(paths.assets.img.svg)
        .pipe(gulp.dest(paths.public.img));

    // ICOs
    var icos = gulp.src(paths.assets.img.ico)
        .pipe(gulp.dest(paths.public.img));

    // Return the streams in one combined stream
    return merge(styles, scripts, pngs, jpgs, gifs, svgs, icos);
});

// Deployment
// ==========
// This task runs 'production' and then grabs all the files
// we want to upload and puts them in there own folder.

gulp.task('deploy', ['production'], function() {
    gulp.src(deployment.files, {base: '.'})
        .pipe(gulp.dest(deployment.destination));
});

// Default
// =======
// Runs every task, and then watches the project  for changes.

gulp.task('default', function(callback) {
    sequence(
        'clean',
        ['styles', 'scripts', 'images'],
        'watch',
        callback);

    notifier.notify({message: 'Tasks complete'});
});
