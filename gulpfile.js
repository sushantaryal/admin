const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

var directories = {
    'bower_components/bootstrap/dist/fonts': 'public/assets/fonts',
	'bower_components/font-awesome/fonts': 'public/assets/fonts',
    'bower_components/summernote/dist/font': 'public/assets/css/font',
    'bower_components/iCheck/square/blue.png': 'public/assets/css/blue.png',
    'bower_components/iCheck/square/blue@2x.png': 'public/assets/css/blue@2x.png',
};

elixir((mix) => {
    for (directory in directories) {
		mix.copy(directory, directories[directory]);
	}

    mix.scripts([
        '../../../bower_components/jquery/dist/jquery.min.js',
		'../../../bower_components/bootstrap/dist/js/bootstrap.min.js',
        '../../../bower_components/jquery-validation/dist/jquery.validate.min.js',
        '../../../bower_components/datatables/media/js/jquery.dataTables.min.js',
        '../../../bower_components/datatables/media/js/dataTables.bootstrap.min.js',
        '../../../bower_components/datatables-responsive/js/dataTables.responsive.js',
        '../../../bower_components/datatables-responsive/js/responsive.bootstrap.js',
        '../../../bower_components/bootbox.js/bootbox.js',
		'../../../bower_components/moment/min/moment.min.js',
		'../../../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        '../../../bower_components/fastclick/lib/fastclick.js',
        '../../../bower_components/select2/dist/js/select2.min.js',
        '../../../bower_components/iCheck/icheck.js',
        '../../../bower_components/summernote/dist/summernote.js',
        '../../../bower_components/dropzone/dist/dropzone.js',
        'jquery.uploadPreview.js',
        'AdminLTE.js',
        'main.js'
    ], 'public/assets/js/app.js');

    mix.sass([
        '../../../bower_components/datatables-responsive/css/responsive.bootstrap.scss'
    ], 'resources/assets/css/responsive.bootstrap.css');

    mix.styles([
        '../../../bower_components/bootstrap/dist/css/bootstrap.css',
        '../../../bower_components/font-awesome/css/font-awesome.css',
        '../../../bower_components/datatables/media/css/dataTables.bootstrap.min.css',
        'responsive.bootstrap.css',
        '../../../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css',
        '../../../bower_components/select2/dist/css/select2.css',
        '../../../bower_components/iCheck/square/blue.css',
        '../../../bower_components/summernote/dist/summernote.css',
        '../../../bower_components/dropzone/dist/dropzone.css',
        'AdminLTE.css',
        '_all-skins.css',
        'style.css'
    ], 'public/assets/css/app.css');
});
