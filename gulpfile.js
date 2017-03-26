const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

elixir(mix => {

    /**
     * Vendor assets
     */
    mix.copy('resources/assets/bower_components/lightgallery.js/dist/fonts', 'public/build/fonts');
    mix.copy('resources/assets/bower_components/font-awesome/fonts', 'public/build/fonts');
    mix.copy('resources/assets/bower_components/bootstrap/dist/fonts', 'public/build/fonts');
    mix.copy('resources/assets/bower_components/lightgallery.js/dist/img', 'public/build/img');

/*    mix.scripts([
        '../bower_components/jquery/dist/jquery.js',
        '../bower_components/bootstrap/dist/js/bootstrap.js',
        '../bower_components/justifiedGallery/dist/js/jquery.justifiedGallery.js',
        '../bower_components/lightgallery.js/dist/js/lightgallery.js',
        '../bower_components/lightgallery.js/demo/js/lg-fullscreen.js',
        '../bower_components/lightgallery.js/demo/js/lg-hash.js',
        '../bower_components/lightgallery.js/demo/js/lg-pager.js',
        '../bower_components/lightgallery.js/demo/js/lg-thumbnail.js',
        '../bower_components/lightgallery.js/demo/js/lg-video.js',
        '../bower_components/lightgallery.js/demo/js/lg-zoom.js',
        '../bower_components/sweetalert/dist/sweetalert-dev.js'
    ], 'public/js/vendor.js');*/

    mix.styles([
        '../bower_components/bootstrap/dist/css/bootstrap.css',
        '../bower_components/font-awesome/css/font-awesome.css',
        '../bower_components/justifiedGallery/dist/css/justifiedGallery.css',
        '../bower_components/lightgallery.js/dist/css/lightgallery.css',
        '../bower_components/lightgallery.js/dist/css/lg-transitions.css',
        '../bower_components/sweetalert/dist/sweetalert.css'
    ], 'public/css/vendor.css');

    /**
     * Applicaiton assets
     */
    mix.sass('app.scss')
       .webpack('app.js');

    mix.version([
        'css/app.css',
        'js/app.js',

        'css/vendor.css',
        'js/vendor.js'
    ]);
});
