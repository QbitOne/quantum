const gulp = require('gulp');
const { watch, series } = require('gulp');

const browserSync = require('browser-sync').create();

const postcss = require('gulp-postcss');
const postcssPreEnv = require('postcss-preset-env');
const postcssImport = require('postcss-import');
const postcssNested = require('postcss-nested');
const postcssVars = require('postcss-simple-vars');
const postcssMixins = require('postcss-mixins');
const postcssHex = require('postcss-hexrgba');
const postcssComments = require('postcss-discard-comments');
const autoprefixer = require('autoprefixer');
const minifyCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

const mdcss = require('mdcss');
const mdcssTheme = require('mdcss-theme-github');

const terser = require('gulp-terser');
const concat = require('gulp-concat');

function style() {
  return gulp
    .src('./postcss/main.css')
    .pipe(
      postcss([
        postcssPreEnv,
        postcssImport,
        postcssNested,
        postcssVars,
        postcssMixins,
        postcssHex,
        autoprefixer,
        mdcss({
          theme: mdcssTheme({
            title: 'Quantum Theme Styleguide',
            color: '#212121',
          }),
        }),
        postcssComments,
      ])
    )
    .pipe(rename('style.css'))
    .pipe(gulp.dest('./assets/css/unminified'));
}

function compileCSS() {
  return gulp
    .src('./assets/css/unminified/style.css')
    .pipe(minifyCSS())
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('./assets/css/minified'));
}

function compileJS() {
  /**
   * SCRIPT FORMAT:
   *
   * npm run compile:js -- --source
   * source is the filename without '.js'
   */
  const source = process.argv
    .splice(3, process.argv.length - 3)
    .toString()
    .replace('--', '');
    
  if(!source) {
    console.log('Source missing...\nUse: npm run compile:js -- --Source')
    return
  }

  if (source) {
    return gulp
      .src(`./assets/js/unminified/${source}.js`)
      .pipe(
        terser({
          toplevel: true,
        })
      )
      .pipe(concat(`${source}.min.js`))
      .pipe(gulp.dest('./assets/js/minified'));
  }

  /**
   * SCRIPT FORMAT:
   *
   * npm run compile:js
   * bundle all script in assets/js/core to 'bundle.min.js'
   
  return gulp
    .src('./assets/js/*.js')
    .pipe(
      terser({
        toplevel: true,
      })
    )
    .pipe(concat('bundle.min.js'))
    .pipe(gulp.dest('./assets/js'));
    */
}

function runServer() {
  watch('./postcss/**/*.css', series(style, compileCSS));
  browserSync.init({
    proxy: 'https://quantum.local',
    browser: 'google chrome',
  });
}

exports.compilecss = series(style, compileCSS);
exports.compilejs = compileJS;
exports.serve = runServer;
