(function ($) {
    'use strict';

    $(function () {
        $('[data-om-cc-checkbox]').change(function () {
            var input = $(this).parent().find('input[type=hidden]');
            input.val('data@@' + ($(this).is(':checked') ? 'true' : 'false'));
            input.trigger('change');
        });
    });

})(jQuery);