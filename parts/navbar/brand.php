<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;
use Openmarco\Seriously\Html\Helpers;
use Openmarco\Seriously\Service\Image;

$blogName = get_option('blogname');

if (Customizer::get(MOD_NAVBAR_LOGO_TEXT_SITE_TITLE)) {
	$logoTextDesktop = $blogName;
} else if ($value = Customizer::get(MOD_NAVBAR_LOGO_TEXT)) {
	$logoTextDesktop = $value;
} else {
	$logoTextDesktop = '';
}

if (Customizer::get(MOD_NAVBAR_M_LOGO_TEXT_SITE_TITLE)) {
	$logoTextMobile = $blogName;
} else if (Customizer::get(MOD_NAVBAR_M_LOGO_TEXT)) {
	$logoTextMobile = Customizer::get(MOD_NAVBAR_M_LOGO_TEXT);
} else {
	$logoTextMobile = '';
}

$logoDefaultDesktopId = Customizer::get(MOD_NAVBAR_LOGO_IMAGE);
$logoDefaultMobileId  = Customizer::get(MOD_NAVBAR_M_LOGO_IMAGE) ?: $logoDefaultDesktopId;
$logoLsDesktopId      = Customizer::get(MOD_LS_NAVBAR_LOGO_IMAGE) ?: $logoDefaultDesktopId;
$logoDsDesktopId      = Customizer::get(MOD_DS_NAVBAR_LOGO_IMAGE) ?: $logoDefaultDesktopId;
$logoLsMobileId       = Customizer::get(MOD_LS_NAVBAR_M_LOGO_IMAGE) ?: $logoDefaultMobileId;
$logoDsMobileId       = Customizer::get(MOD_DS_NAVBAR_M_LOGO_IMAGE) ?: $logoDefaultMobileId;

?>

<a class="nav navbar-brand float-xs-left"<?php Helpers::url('href', home_url('/')) ?>>
	<?php if (Image::exists($logoLsDesktopId)) : ?>
        <img<?php Helpers::url('src', Image::getUrl($logoLsDesktopId, 'full')) ?>
                alt="<?php echo esc_attr($logoTextDesktop) ?>"
                class="hidden-md-down logo-img-light logo-img">
	<?php endif; ?>
	<?php if (Image::exists($logoDsDesktopId)) : ?>
        <img<?php Helpers::url('src', Image::getUrl($logoDsDesktopId, 'full')) ?>
                alt="<?php echo esc_attr($logoTextDesktop) ?>"
                class="hidden-md-down logo-img-dark logo-img">
	<?php endif; ?>
	<?php if (Image::exists($logoLsMobileId)) : ?>
        <img<?php Helpers::url('src', Image::getUrl($logoLsMobileId, 'full')) ?>
                alt="<?php echo esc_attr($logoTextMobile) ?>"
                class="hidden-lg-up logo-img-light logo-img">
	<?php endif; ?>
	<?php if (Image::exists($logoDsMobileId)) : ?>
        <img<?php Helpers::url('src', Image::getUrl($logoDsMobileId, 'full')) ?>
                alt="<?php echo esc_attr($logoTextMobile) ?>"
                class="hidden-lg-up logo-img-dark logo-img">
	<?php endif; ?>
    <span class="navbar-brand-text hidden-md-down"><?php echo esc_html($logoTextDesktop); ?></span>
    <span class="navbar-brand-text hidden-lg-up"><?php echo esc_html($logoTextMobile); ?></span>
</a>
