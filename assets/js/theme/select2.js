(function ($, global) {
	'use strict';

	var $selects = $('select.form-control')
		.select2({
			width: '100%'
		})
		.removeClass('select2-hidden-accessible')
		.addClass('select2-hidden-custom');

	if (/iPad|iPhone|iPod/.test(navigator.userAgent) && !global.MSStream) {
		$selects.off('focus.select2');
	}

	$(function ($) {
		if (global.nfForms && global.Marionette) {
			var ninjaformsReady = Marionette.Object.extend( {

				initialize: function() {
					this.listenTo( nfRadio.channel( 'form' ), 'render:view', this.nfReady );
				},

				nfReady: function( view ) {
					var $selects = $('select.form-control:not(.select2-hidden-custom)')
						.select2({
							width: '100%'
						})
						.removeClass('select2-hidden-accessible')
						.addClass('select2-hidden-custom');

					if (/iPad|iPhone|iPod/.test(navigator.userAgent) && !global.MSStream) {
						$selects.off('focus.select2');
					}
				},

			});

			// Instantiate our custom controller, defined above.
			new ninjaformsReady();
		}
	});

})(jQuery, window);
