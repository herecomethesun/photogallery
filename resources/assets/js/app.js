;(function($) {

    var $editor = $('.editor');
    if ($editor.length) {
        CKEDITOR.replaceAll('editor');
    }

    $editor = $('.editor_limited');
    if ($editor.length) {
        CKEDITOR.config.removePlugins = 'youtube,link,image,htmlwriter,table,tabletools,pastefromword';
        CKEDITOR.replaceAll('editor_limited');
    }

})(jQuery);