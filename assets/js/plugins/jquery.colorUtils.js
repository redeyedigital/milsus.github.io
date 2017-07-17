!function ($) {
    'use strict';


    var getRGBA = function () {

        var $body = $('body');

        var $test = $('<span>').css({
            display: 'none',
            opacity: 0,
            width: 0,
            position: 'absolute',
            left: -2000
        }).appendTo($body);

        var cache = {};

        return function (color) {
            if (cache[color]) {
                return cache[color];
            }

            var matches = $test.appendTo($body).css('color', color).css('color').match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);

            $test.detach();

            return cache[color] = {
                r: Number(matches[1]),
                g: Number(matches[2]),
                b: Number(matches[3]),
                a: Number(matches[4]) || 1
            };
        }
    }();

    var fade = function (color, alpha) {
        if (typeof alpha !== 'number') {
            alpha = parseFloat(alpha);
        }

        if (isNaN(alpha)) {
            alpha = 1;
        }

        alpha = Math.max(0, Math.min(alpha, 1));

        color = getRGBA(color);
        color.a = alpha;

        return 'rgba(' + color.r + ',' + color.g + ',' + color.b + ',' + color.a + ')';
    };

    var isDark = function (color) {
        color = getRGBA(color);

        return (color.r * 299 + color.g * 587 + color.b * 114) / 1000 < 128;
    };

    $.colorUtils = {
        fade: fade,
        isDark: isDark
    }

}(jQuery);