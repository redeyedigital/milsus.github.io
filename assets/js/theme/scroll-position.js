(function ($, global) {
    'use strict';

    var DATA_KEY = 'om.scroll-position';
    var EVENT_KEY = '.' + DATA_KEY;
    var TOP_EVENT = 'top' + EVENT_KEY;
    var NO_TOP_EVENT = 'no-top' + EVENT_KEY;

    var NO = 'no-';
    var SCROLL_TOP_CLASS = 'window-scroll-top';
    var NO_SCROLL_TOP_CLASS = NO + SCROLL_TOP_CLASS;

    var $window = $(global);
    var $document = $(global.document);
    var $body = $(global.document.body);

    var topState;

    var update = function () {
        var topCurrent = $window.scrollTop() === 0,
            removeClasses,
            addClasses,
            event;

        if (topCurrent !== topState) {
            topState = topCurrent;

            if (topState) {
                removeClasses = NO_SCROLL_TOP_CLASS;
                addClasses = SCROLL_TOP_CLASS;
                event = TOP_EVENT;
            } else {
                removeClasses = SCROLL_TOP_CLASS;
                addClasses = NO_SCROLL_TOP_CLASS;
                event = NO_TOP_EVENT;
            }

            $body.removeClass(removeClasses).addClass(addClasses);
            $document.trigger(event);
        }
    };

    $window.scroll(update);
    update();
    $(update);

})(jQuery, window);
