let mix = require('laravel-mix');

const themeDir = "./web/app/themes/portfolio";
const resourceDir = themeDir + "/resources";
const publicDir = themeDir + "/public";

mix.js(
    resourceDir + '/js/app.js',
    '/js/app.js'
).js(
    resourceDir + '/js/contact.js',
    '/js/contact.js'
).sass(
    resourceDir + '/sass/theme.scss',
    '/css/theme.css'
).setPublicPath(publicDir);