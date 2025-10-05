const config = require("./webpack.config.js");
const mix = require("laravel-mix");
const path = require("path");
let golb = require("glob");
golb.sync('./Modules/**/webpack.mix.js').forEach(item => require(item));

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
function resolve(dir) {
    return path.join(__dirname, "/resources/js", dir);
}

if (mix.inProduction()) {
    mix.version();
} else {
    // Development settings
    mix.sourceMaps();
}
