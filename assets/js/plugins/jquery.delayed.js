!function ($) {
    'use strict';

    $.fn.delayed = function (fn) {
        var $this = this,
            parameters = Array.prototype.slice.call(arguments, 1);

        fn = $.isFunction(fn) ? fn : $.isFunction($this[fn]) ? $this[fn] : null;

        if (fn) {
            $this.queue(function (next) {
                fn.apply($this, parameters);

                next();
            });
        }

        return this;
    };
}(jQuery);