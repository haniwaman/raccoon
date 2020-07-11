var gulp = require("gulp");
var sass = require("gulp-sass");
var plumber = require("gulp-plumber");
var notify = require("gulp-notify");
const rename = require("gulp-rename");
var sassGlob = require("gulp-sass-glob");
var mmq = require("gulp-merge-media-queries");
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
	let style = gulp
		.src("./src/sass/style.scss")
		.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe(sassGlob())
		.pipe(sass({ outputStyle: "expanded" }))
		.pipe(postcss([autoprefixer()]))
		.pipe(postcss([cssdeclsort({ order: "alphabetical" })]))
		.pipe(mmq())
		.pipe(gulp.dest("./src/css"));

	let header_min = gulp
		.src("./src/sass/header.scss")
		.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe(sassGlob())
		.pipe(postcss([autoprefixer()]))
		.pipe(postcss([cssdeclsort({ order: "alphabetical" })]))
		.pipe(mmq())
		.pipe(sass({ outputStyle: "compressed" }))
		.pipe(
			rename({
				suffix: ".min"
			})
		)
		.pipe(gulp.dest("./src/css"));

	return merge(style, header_min);
});

gulp.task("watch", function() {
	gulp.watch("./src/sass/**/*.scss", ["sass"]);
});

gulp.task("watch", function(done) {
	gulp.watch("./src/sass/**/*.scss", gulp.task("sass"));
	gulp.watch("./*.php");
	gulp.watch("./src/css/*.css");
	gulp.watch("./src/js/*.js");
});

gulp.task("default", gulp.series(gulp.parallel("watch")));

gulp.task("imagemin", function() {
	return gulp
		.src("./src/img/base/*.{png,jpg,gif,svg}")
		.pipe(imagemin(imageminOption))
		.pipe(gulp.dest("./src/img"));
});
