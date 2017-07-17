!function ($, global) {
    'use strict';

    $('[data-om-cc-category-nav]').on('change', function () {
        global.location.href = $(this).val();
    });
}(jQuery, window);