!function ($, global, Modernizr) {
    'use strict';

    var document = global.document;
    var body = document.body;
    var userAgent = global.navigator.userAgent;

    var $html = $('html');
    var $document = $(document);
    var $body = $(body);

    var isMobile = $('meta[name=ismobile]').prop('content') === 'true';

    // Add iOS Safari flag class
    if (isMobile && userAgent.match(/iP(hone|ad)/) && userAgent.match(/Safari/)) {
        $html.addClass('is-ios-safari');
    }

    // Fix IE Mobile flexboxlegacy
    if (isMobile && userAgent.match(/IEMobile/)) {
        Modernizr.flexboxlegacy = false;
        $html.removeClass('flexboxlegacy').addClass('no-flexboxlegacy');
    }

    // Reactive Images Init
    if($.reactiveImages) {
        $.reactiveImages({
            lazyload: {
                offset: '-5%'
            }
        });
    }

    // Init page
    function init() {
        $body.removeClass('body-hidden');
    }

    // Wait for Visual Composer full width rows initialize if exists
    if ($('[data-vc-full-width-init="false"]').length) {
        $document.on('vc-full-width-row', init);
    } else {
        init();
    }


}(jQuery, window, Modernizr);