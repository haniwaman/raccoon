var gulp = require("gulp");
var sass = require("gulp-sass");
var plumber = require("gulp-plumber");
var notify = require("gulp-notify");
var sassGlob = require("gulp-sass-glob");
var mmq = require("gulp-merge-media-queries");
var browserSync = require("browser-sync");
var imagemin = require("gulp-imagemin");
var imageminPngquant = require("imagemin-pngquant");
var imageminMozjpeg = require("imagemin-mozjpeg");

var postcss = require("gulp-postcss");
var autoprefixer = require("autoprefixer");
var cssdeclsort = require("css-declaration-sorter");

var merge = require("merge-stream");

var imageminOption = [
	imageminPngquant({ quality: "65-80" }),
	imageminMozjpeg({ quality: 85 }),
	imagemin.gifsicle({
		interlaced: false,
		optimizationLevel: 1,
		colors: 256
	}),
	imagemin.jpegtran(),
	imagemin.optipng(),
	imagemin.svgo()
];

gulp.task("sass", function() {
	var style = gulp
		.src("./src/sass/style.scss")
		.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe(sassGlob())
		.pipe(sass({ outputStyle: "expanded" }))
		.pipe(postcss([autoprefixer()]))
		.pipe(postcss([cssdeclsort({ order: "alphabetically" })]))
		.pipe(mmq())
		.pipe(gulp.dest("./src/css"));

	var header = gulp
		.src("./src/sass/header.scss")
		.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe(sassGlob())
		.pipe(postcss([autoprefixer()]))
		.pipe(postcss([cssdeclsort({ order: "alphabetically" })]))
		.pipe(mmq())
		.pipe(sass({ outputStyle: "compressed" }))
		.pipe(gulp.dest("./src/css"));

	return merge(style, header);
});

gulp.task("watch", function() {
	gulp.watch("./src/sass/**/*.scss", ["sass"]);
});

gulp.task("bs-reload", function() {
	browserSync.reload();
});

gulp.task("default", ["watch"], function() {
	gulp.watch("./*.php");
	gulp.watch("./src/css/*.css");
	gulp.watch("./src/js/*.js");
});

gulp.task("imagemin", function() {
	return gulp
		.src("./src/img/base/*.{png,jpg,gif,svg}")
		.pipe(imagemin(imageminOption))
		.pipe(gulp.dest("./src/img"));
});
