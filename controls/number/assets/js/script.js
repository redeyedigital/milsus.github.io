(function ($) {
    'use strict';

    $(function () {
        $('[data-om-cc-number]').change(function () {
            var input = $(this).parent().find('input[type=hidden]');
            input.val('data@@' + ($(this).val()));
            input.trigger('change');
        });
    });

})(jQuery);