<?php

namespace Openmarco\Seriously\std;

add_filter(FILTER_OMT_ADMIN_TGMPA_PLUGINS, function (array $plugins) {
	return array_merge($plugins, [
		
		// Envato
		
		[
			'name'     => 'WPBakery Visual Composer',
			'slug'     => 'js_composer',
			'source'   => 'http://openmarco.com/repo/visual-composer/js_composer-5.0.1.zip',
			'version'  => '5.0.1',
			'required' => false
		],
		/*[
			'name'     => 'Slider Revolution',
			'slug'     => 'slider-revolution',
			'source'   => 'http://openmarco.com/repo/slider-revolution/slider-revolution.5.3.0.2.zip',
			'version'  => '5.3.0.2',
			'required' => false
		],*/
		
		// Openmarco
		
		[
			'name'     => 'Font I Want',
			'slug'     => 'omp-font-i-want',
			'source'   => 'http://openmarco.com/repo/omp-font-i-want/omp-font-i-want.1.1.4.zip',
			'version'  => '1.1.4',
			'required' => false
		],
		[
			'name'     => 'Creative Background Layers',
			'slug'     => 'omp-container',
			'source'   => 'http://openmarco.com/repo/omp-container/omp-container.1.0.0.zip',
			'version'  => '1.0.0',
			'required' => false
		],
		[
			'name'     => 'Creative Content Blocks',
			'slug'     => 'omp-content-blocks',
			'source'   => 'http://openmarco.com/repo/omp-content-blocks/omp-content-blocks.1.0.0.zip',
			'version'  => '1.0.0',
			'required' => false
		],
		[
			'name'     => 'Creative Single Image',
			'slug'     => 'omp-image',
			'source'   => 'http://openmarco.com/repo/omp-image/omp-image.1.0.0.zip',
			'version'  => '1.0.0',
			'required' => false
		],
		[
			'name'     => 'Creative SVG Support',
			'slug'     => 'omp-svg',
			'source'   => 'http://openmarco.com/repo/omp-svg/omp-svg.1.0.0.zip',
			'version'  => '1.0.0',
			'required' => false
		],
		
		// Openmarco Creative
		
		[
			'name'     => 'Creative Google Maps',
			'slug'     => 'om-cc-google-maps',
			'source'   => 'http://openmarco.com/repo/om-cc-google-maps/om-cc-google-maps.1.3.2.zip',
			'version'  => '1.3.2',
			'required' => false
		],
		[
			'name'     => 'Creative Social Links',
			'slug'     => 'om-cc-social-links',
			'source'   => 'http://openmarco.com/repo/om-cc-social-links/om-cc-social-links.1.3.2.zip',
			'version'  => '1.3.2',
			'required' => false
		],
		[
			'name'     => 'Creative Image Carousel',
			'slug'     => 'om-cc-carousel',
			'source'   => 'http://openmarco.com/repo/om-cc-carousel/om-cc-carousel.1.3.2.zip',
			'version'  => '1.3.2',
			'required' => false
		],
		[
			'name'     => 'Creative Devices Mock-ups',
			'slug'     => 'om-cc-device',
			'source'   => 'http://openmarco.com/repo/om-cc-device/om-cc-device.1.3.2.zip',
			'version'  => '1.3.2',
			'required' => false
		],
		[
			'name'     => 'Creative Image Gallery',
			'slug'     => 'om-cc-gallery',
			'source'   => 'http://openmarco.com/repo/om-cc-gallery/om-cc-gallery.1.3.3.zip',
			'version'  => '1.3.3',
			'required' => false
		],
		[
			'name'     => 'Creative Grid',
			'slug'     => 'om-cc-grid',
			'source'   => 'http://openmarco.com/repo/om-cc-grid/om-cc-grid.1.3.3.zip',
			'version'  => '1.3.3',
			'required' => false
		],
		[
			'name'     => 'Creative Logo Showcase',
			'slug'     => 'om-cc-logo',
			'source'   => 'http://openmarco.com/repo/om-cc-logo/om-cc-logo.1.0.2.zip',
			'version'  => '1.0.2',
			'required' => false
		],
		[
			'name'     => 'Creative Team Members',
			'slug'     => 'om-cc-team',
			'source'   => 'http://openmarco.com/repo/om-cc-team/om-cc-team.1.0.1.zip',
			'version'  => '1.0.1',
			'required' => false
		],
		
		// WordPress
		
		/*[
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false
		],
		[
			'name'     => 'Bootstrap for Contact Form 7',
			'slug'     => 'bootstrap-for-contact-form-7',
			'required' => false
		],*/
		[
			'name'     => 'Ninja Forms',
			'slug'     => 'ninja-forms',
			'required' => false
		],
		[
			'name'     => 'WP Job Manager',
			'slug'     => 'wp-job-manager',
			'required' => false
		]
	]);
});