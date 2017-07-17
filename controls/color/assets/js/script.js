;( function( $, window, document ) {

	"use strict";

	var pluginName = 'omColorAdvanced',
		checkerboard = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAAHnlligAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAHJJREFUeNpi+P///4EDBxiAGMgCCCAGFB5AADGCRBgYDh48CCRZIJS9vT2QBAggFBkmBiSAogxFBiCAoHogAKIKAlBUYTELAiAmEtABEECk20G6BOmuIl0CIMBQ/IEMkO0myiSSraaaBhZcbkUOs0HuBwDplz5uFJ3Z4gAAAABJRU5ErkJggg==';

	Color.prototype.toString = function (removeAlpha) {
		if (removeAlpha == 'no-alpha') {
			return this.toCSS('rgba', '1').replace(/\s+/g, '');
		}
		if (this._alpha < 1) {
			return this.toCSS('rgba', this._alpha).replace(/\s+/g, '');
		}
		var hex = parseInt(this._color, 10).toString(16);
		if (this.error) return '';
		if (hex.length < 6) {
			for (var i = 6 - hex.length - 1; i >= 0; i--) {
				hex = '0' + hex;
			}
		}
		return '#' + hex;
	};

	function transparentBg(color) {
		return color !== '' ? "linear-gradient(" + color + "," + color + "), url('" + checkerboard + "')" : '';
	}

	// The actual plugin constructor
	function Plugin ( element, options ) {
		this.element   = element;
		this.$element  = $(element);
		this.initValue = this.$element.val().replace(/\s+/g, '');
		this.useAlpha  = !!options && !!options.useAlpha || !!this.$element.data('omCcColorAdvanced');
		this.init(options);
	}

	$.extend(Plugin.prototype, {
		init: function (options) {
			var optionsChange = !!options && options.change || null,
				optionsClear  = !!options && options.clear  || null,
				$element = this.$element,
				initValue = this.initValue,
				styleToggler = function (color) {
					color = color || $element.val();
					$element.data('wpWpColorPicker').toggler.css({
						backgroundImage: transparentBg(color)
					});
				};

			if (!this.useAlpha) {
				options = $.extend({}, options, {
					clear: function (event, ui) {
						if (wp.customize) {
							setTimeout(function () {
								// send ajax request to wp.customizer to enable Save & Publish button
								var _newValue = $element.val();

								var key = $element.data('customize-setting-link');
								wp.customize(key, function (obj) {
									obj.set(_newValue);
								});
							}, 300);
						}

						$element.trigger('om-color-change');

						if ( $.isFunction( optionsClear ) ) {
							optionsClear.call( this, event, ui );
						}
					}.bind(this),
					change: function (event, ui) {
						if (wp.customize) {
							setTimeout(function () {
								// send ajax request to wp.customizer to enable Save & Publish button
								var _newValue = $element.val();

								var key = $element.data('customize-setting-link');
								wp.customize(key, function (obj) {
									obj.set(_newValue);
								});
							}, 300);
						}

						$element.trigger('om-color-change');
						if ( $.isFunction( optionsChange ) ) {
							optionsChange.call( this, event, ui );
						}
					}.bind(this)
				});
				$element.wpColorPicker(options);
			} else {
				options = $.extend({}, options, { // change some things with the color picker
					clear: function (event, ui) {
						// TODO reset Alpha Slider to 100
						if (wp.customize) {
							setTimeout(function () {
								// send ajax request to wp.customizer to enable Save & Publish button
								var _newValue = $element.val();

								var key = $element.data('customize-setting-link');
								wp.customize(key, function (obj) {
									obj.set(_newValue);
								});
							}, 300);
						}

						styleToggler();
						$element.trigger('om-color-change');

						if ( $.isFunction( optionsChange ) ) {
							optionsChange.call( this, event, ui );
						}
					}.bind(this),
					change: function (event, ui) {
						if (wp.customize) {
							setTimeout(function () {
								// send ajax request to wp.customizer to enable Save & Publish button
								var _newValue = $element.val();

								var key = $element.data('customize-setting-link');
								wp.customize(key, function (obj) {
									obj.set(_newValue);
								});
							}, 300);
						}

						// change the background color of our transparency container whenever a color is updated
						var $transparency = $element.parents('.wp-picker-container:first').find('.transparency');
						// we only want to show the color at 100% alpha
						$transparency.css('backgroundColor', ui.color.toString('no-alpha'));

						styleToggler(ui.color.toString());
						$element.trigger('om-color-change');

						if ( $.isFunction( optionsChange ) ) {
							optionsChange.call( this, event, ui );
						}
					}.bind(this)//,
					//palettes: palette // remove the color palettes
				});
				$element.wpColorPicker(options);

				var	$alphaContainer = $('<div class="pluto-alpha-container"><div class="slider-alpha"></div><div class="transparency"></div></div>').appendTo($element.parents('.wp-picker-container')),
					$alphaSlider = $alphaContainer.find('.slider-alpha'),
					$transparency = $alphaContainer.find('.transparency'),
					alphaVal;

				$transparency.css('backgroundColor', $element.iris('color', true).toString('no-alpha'));
				styleToggler();

				// if in format RGBA - grab A channel value
				if (initValue.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)) {
					alphaVal = parseFloat(initValue.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)[1]) * 100;
					alphaVal = parseInt(alphaVal);
				} else {
					alphaVal = 100;
				}

				$alphaSlider.slider({
					slide: function (event, ui) {
						$(this).find('.ui-slider-handle').text(ui.value); // show value on slider handle

						if (wp.customize) {
							// send ajax request to wp.customizer to enable Save & Publish button
							var _newValue = $element.val();
							var key = $element.attr('data-customize-setting-link');
							wp.customize(key, function (obj) {
								obj.set(_newValue);
							});
						}
					},
					create: function (event, ui) {
						var v = $(this).slider('value');
						$(this).find('.ui-slider-handle').text(v);
					},
					value: alphaVal,
					range: "max",
					step: 1,
					min: 0,
					max: 100
				}); // slider

				$alphaSlider.slider().on('slidechange', function (event, ui) {
					var newAlphaVal = parseFloat(ui.value),
						iris = $element.data('a8cIris'),
						colorPicker = $element.data('wpWpColorPicker');

					iris._color._alpha = newAlphaVal / 100.0;

					$element.val(iris._color.toString());

					styleToggler();

					// fix relationship between alpha slider and the 'side slider not updating.
					var getVal = $element.val();

					$element.wpColorPicker('color', getVal);
				});
			}
		}
	});

	$.fn[ pluginName ] = function( options ) {
		return this.each( function() {
			if ( !$.data( this, 'plugin_' + pluginName ) ) {
				$.data( this, 'plugin_' +
					pluginName, new Plugin( this, options ) );
			}
		} );
	};

	$(function () {
		$('[data-om-cc-color-advanced]')[pluginName]();
	});

} )( jQuery, window, document );
