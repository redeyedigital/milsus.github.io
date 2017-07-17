<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;

$toggleType = Customizer::get(MOD_NAVBAR_M_TOGGLE_TYPE);

?>

<a class="navbar-toggle hidden-lg-up float-xs-right collapsed"
   data-toggle="collapse"
   data-target="#navbarResponsive"
   aria-controls="navbarResponsive"
   aria-expanded="false"
   aria-label="Toggle navigation">
    <span class="sr-only"><?php echo esc_html__('Toggle navigation', 'seriously'); ?></span>
	<?php if ($toggleType === 'icon' || $toggleType === 'both') : ?>
        <span class="icon-bar"></span><span class="icon-bar"></span>
	<?php endif; ?>
	<?php if ($toggleType === 'text' || $toggleType === 'both') : ?>
        <span class="navbar-toggle-title">
			<?php if ($text = Customizer::get(MOD_NAVBAR_M_TOGGLE_TEXT)) : ?>
				<?php echo esc_html($text) ?>
			<?php else : ?>
				<?php esc_html_e('Menu', 'seriously') ?>
			<?php endif ?>
		</span>
	<?php endif; ?>
</a>
