var gulp = require('gulp'),
    $    = require('gulp-load-plugins')(),
    meta = require('./package.json');

var argv = require('minimist')(process.argv.slice(2));

var jsDir     = 'src/App/Bundle/MainBundle/Resources/assets/js/',
    sassDir   = 'src/App/Bundle/MainBundle/Resources/assets/sass/',
    fontsDir  = 'src/App/Bundle/MainBundle/Resources/assets/fonts/',
    imagesDir = 'src/App/Bundle/MainBundle/Resources/assets/images/',
    distDir   = 'web/assets',
    libsSass  = [
        // 'node_modules/xxx/xxx/xxx.scss',
        sassDir + '*.scss'
    ],
    libsJS    = [
        'node_modules/jquery/dist/jquery.js',
        jsDir + '**/*.js'
    ],
    banner    = [
        '/*!',
        ' * =============================================================',
        ' * <%= name %> v<%= version %> - <%= description %>',
        ' *',
        ' * (c) 2015 - <%= author %>',
        ' * =============================================================',
        ' */\n\n'
    ].join('\n');

var onError = function (err) {
    $.util.beep();
    console.log(err.toString());
    this.emit('end');
};

gulp.task('fonts', function() {
    return gulp.src(fontsDir + '**/*')
        .pipe(gulp.dest(distDir + "/fonts"));
});

gulp.task('images', function() {
    return gulp.src(imagesDir + '**/*')
        .pipe(gulp.dest(distDir + "/images"));
});

gulp.task('sass', function() {
    return gulp.src(libsSass)
        .pipe($.plumber({ errorHandler: onError }))
        .pipe($.sass())
        .pipe($.autoprefixer())
        .pipe($.if(!argv.dev, $.minifyCss()))
        .pipe($.concat('main.css'))
        .pipe($.header(banner, meta))
        .pipe(gulp.dest(distDir + "/css"));
});

gulp.task('scripts', function() {
    return gulp.src(libsJS)
        .pipe($.plumber({ errorHandler: onError }))
        .pipe($.if(!argv.dev, $.uglify()))
        .pipe($.concat('main.js'))
        .pipe($.header(banner, meta))
        .pipe(gulp.dest(distDir + "/js"));
});

gulp.task('default', ['sass', 'scripts', 'images', 'fonts'], function() {
    gulp.watch(jsDir + '**/*.js', ['scripts']);
    gulp.watch(sassDir + '**/*.scss', ['sass']);
    gulp.watch(imagesDir + '**/*', ['images']);
    gulp.watch(fontsDir + '**/*', ['fonts']);
});

gulp.task('build', ['sass', 'scripts', 'images', 'fonts']);
