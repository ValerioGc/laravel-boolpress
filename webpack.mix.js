    const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

    const argv = require('minimist')(process.argv.slice(2));

    const src = {
        user: {
            js: 'resources/js/app.js',
            sass: 'resources/sass/app.scss'
        },
        admin: {
            js: 'resources/js/admin.js',
            sass: 'resources/sass/admin.scss'
        }
    }
    const dest = {
        js: 'public/js',
        sass: 'public/css'
    }
    // User
    if (argv.user) {
        mix.js(src.user.js, dest.js)
            .sass(src.user.sass, dest.sass);
    }
    // Admin
    else if (argv.admin) {
        mix.js(src.admin.js, dest.js)
            .sass(src.admin.sass, dest.sass);
    }
    else {
        mix.js(src.user.js, dest.js)
            .sass(src.user.sass, dest.sass);
    }
