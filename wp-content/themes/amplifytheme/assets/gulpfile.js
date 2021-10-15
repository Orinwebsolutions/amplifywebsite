"use strict";

var gulp = require("gulp");
var sass = require("gulp-sass")(require("sass"));

function build() {
  return gulp
    .src("./src/scss/**/*.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(gulp.dest("./"));
}

exports.build = build;
exports.watch = function () {
  gulp.watch("./src/scss/**/*.scss", build);
};
