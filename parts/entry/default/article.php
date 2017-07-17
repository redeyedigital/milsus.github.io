<?php

namespace Openmarco\Seriously\std;

$mode = is_singular() ? 'singular' : 'multiple';

?>

<article <?php post_class('classic-content'); ?>>
	<?php get_template_part('parts/entry/default/header', $mode); ?>

    <div class="sr-only">
		<?php get_template_part('parts/entry/meta'); ?>
    </div>
	
	<?php get_template_part('parts/post/default/content', $mode) ?>
	
	<?php if (is_singular()) : ?>
		<?php get_template_part('parts/entry/singular-pagination'); ?>
	<?php endif ?>
</article>
