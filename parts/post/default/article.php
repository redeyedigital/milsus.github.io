<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;

$mode = is_singular() ? 'singular' : 'multiple';

$isFeatured = is_singular()
	? Customizer::get(MOD_POST_FEATURED_IMAGE_ENABLED)
	: Customizer::get(MOD_POSTS_PAGE_FEATURED_IMAGE_ENABLED);

?>

<article <?php post_class('classic-content'); ?>>
	<?php get_template_part('parts/entry/default/header', $mode); ?>
	
	<?php get_template_part('parts/post/default/before-content', $mode); ?>
	
	<?php if ($isFeatured) : ?>
		<?php get_template_part('parts/entry/default/featured-image') ?>
	<?php endif; ?>
	
	<?php if (is_singular()) : ?>
		<?php get_template_part('parts/entry/default/content', $mode) ?>
	<?php else : ?>
		<?php get_template_part('parts/post/default/content') ?>
	<?php endif ?>
	
	<?php get_template_part('parts/post/default/after-content', $mode); ?>
	
	<?php if (is_singular()) : ?>
		<?php get_template_part('parts/entry/singular-pagination'); ?>
	<?php endif ?>
</article>
