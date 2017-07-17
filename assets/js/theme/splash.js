!function ($, global) {
    'use strict';

    var $document   = $(global.document);
    var $body       = $(global.document.body);
    var $splash     = $('[data-om-splash]');

    var load        = $.Deferred();
    var loaded      = $.proxy(load.resolve, load);

    var imgDefer    = $.Deferred();
    var imgLoaded   = $.proxy(imgDefer.resolve, imgDefer);
    var fontsDefer  = $.Deferred();
    var fontsLoaded = $.proxy(fontsDefer.resolve, fontsDefer);

    $.when(imgDefer.promise(), fontsDefer.promise()).then(loaded);

    var location = global.location;
    var url = location.origin + location.pathname;

    var hideTimer = setTimeout(loaded, 7e3);

    $splash.addClass('initiated');

    if (global.om && global.om.app && global.om.app.fiw &&
        ((global.om.app.fiw.googleFonts && global.om.app.fiw.googleFonts.length > 0) ||
         (global.om.app.fiw.typekitId   && global.om.app.fiw.typekitId.length   > 0))
    ) {
        $(function () {
            if ($('html').hasClass('wf-active')) {
                fontsLoaded();
            }
        });
        $document.one('fonts-active', fontsLoaded);
    } else {
        // no need to wait fonts loading if GF and TK is empty
        fontsLoaded();
    }


    function isCurrentPage($link) {
        var href = $link.prop('href');

        return $link.data('toggle') || !href || href.replace(url, '')[0] === '#';
    }

    function hideSplash() {
        clearTimeout(hideTimer);

        $splash
            .addClass('pre-loaded')
            .delay(400)
            .delayed('addClass', 'loaded')
            .delayed('removeClass', 'pre-loaded')
            .delayed(function () {
                $body.addClass('splash-loaded');
            })
            .delay($splash.data('omSplash') || 400)
            .delayed('addClass', 'hidden-xs-up');
    }

    function showSplash(e) {
        clearTimeout(hideTimer);

        var $target = $(e.currentTarget);

        if (isCurrentPage($target)) {
            return;
        }

        if ($target.parents('.navmenu-nav').length) {
            $('.navmenu-toggle').trigger('click');
        }

        $body.removeClass('splash-loaded');

        $splash
            .clearQueue()
            .removeClass('hidden-xs-up')
            .delay(50)
            .delayed('removeClass', 'loaded');
    }

    if (jQuery.isFunction(jQuery.fn.imagesLoaded)) {
        $body.imagesLoaded(imgLoaded);
    } else {
        setTimeout(imgLoaded, 1000);
    }

    $(function () {
        $.when(load.promise()).then(hideSplash);

        //$document.on('click', '[data-om-splash-on], .navmenu-nav a, .navmenu-brand', showSplash);
    });

}(jQuery, window);