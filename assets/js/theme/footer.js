!function ($, global) {
    'use strict';

    $(function () {
        if (!Modernizr.flexboxlegacy && Modernizr.csstransforms) {

            var $footer = $('.content-info');
            var shift = 0;

            var makeSticky = function () {
                var diff = $(global).height() - $footer.offset().top - $footer.outerHeight(),
                    transform = '';

                if (diff > 0 || shift > 0) {
                    shift = Math.max(0, shift + diff);
                    transform = 'translateY(' + shift + 'px)';
                }

                $footer.css('transform', transform);
            };

            if ($footer.length) {
                makeSticky();
                setInterval(makeSticky, 500);
            }
        }
    });
}(jQuery, window);