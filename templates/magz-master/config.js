"use strict";
module.exports = {
	css: [
		// AbPath+'templates/admin/bootstrap/css/bootstrap.min.css',
		// AbPath+'templates/admin/bootstrap/css/font-awesome.min.css',
		'scripts/bootstrap/bootstrap.min.css',
		'scripts/ionicons/css/ionicons.min.css',
		'scripts/toast/jquery.toast.min.css',
		'scripts/owlcarousel/dist/assets/owl.carousel.min.css',
		'scripts/owlcarousel/dist/assets/owl.theme.default.min.css',
		'scripts/magnific-popup/dist/magnific-popup.css',
		'scripts/sweetalert/dist/sweetalert.css',

		'css/demo.css',
		'css/fonts.css',
		'css/fonts.css.map',
		'css/safari.css',
		'css/safari.css.map',
		'css/style_compress.css',
		'css/style.css.map',
		'css/variable.css',
		'css/variable.css.map',

		'css/skins/all.css',
		'css/skins/all.css.map',
		'css/skins/blue.css',
		'css/skins/blue.css.map',
		'css/skins/orange.css',
		'css/skins/orange.css.map',
		'css/skins/purple.css',
		'css/skins/purple.css.map',
	],
	font: [
		// 'templates/admin/bootstrap/fonts/*',
	],
	js: [
		'js/jquery.js',
		'js/jquery.migrate.js',
		// 'js/demo.js',
		'js/e-magz.js',
		// 'templates/admin/bootstrap/js/bootstrap.min.js',
		'scripts/jquery-number/jquery.number.min.js',
		'scripts/owlcarousel/dist/owl.carousel.min.js',
		'scripts/magnific-popup/dist/jquery.magnific-popup.min.js',
		'scripts/easescroll/jquery.easeScroll.js',
		'scripts/sweetalert/dist/sweetalert.min.js',
		'scripts/toast/jquery.toast.min.js',
	],
	source: __dirname + "/",
	dest: {
		path: __dirname + "/",
		css: "style_compress.css",
		js: "application.js",
	},
	jscompress: 2, // 1=uglify, 2=packer
	watch: 1 // 1=recompile when changes, 0=compile only
}