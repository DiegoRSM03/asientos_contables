const mix = require('laravel-mix');

mix.disableNotifications();

mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/login.js', 'public/js')
    .sass('resources/sass/app.sass', 'public/css');
