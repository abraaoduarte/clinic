let mix = require('laravel-mix');

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

mix.js('resources/assets/js/admin.js', 'public/js');

mix.scripts([
	'node_modules/jquery/dist/jquery.js',
	'node_modules/popper.js/dist/umd/popper.js',
	'node_modules/bootstrap/dist/js/bootstrap.js',
	'node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
	'node_modules/select2/dist/js/select2.min.js',
], 'public/js/libs.js');

mix.scripts([
		'resources/assets/js/searchSchedules.js',
	], 'public/js/searchSchedules.js');

mix.sass('resources/assets/sass/admin.scss', 'public/css',{
	includePaths: ['node_modules']
});
