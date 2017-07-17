<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;

$taxonomy = Customizer::get(MOD_POSTS_PAGE_TAXONOMY);

?>

<div class="row entry-before-content mb-1">
    <div class="col-md-6">
		<?php get_template_part('parts/entry/default/meta'); ?>
    </div>
	
	<?php if ($taxonomy !== null && taxonomy_exists($taxonomy)) : ?>
		<?php echo get_the_term_list(get_the_ID(), $taxonomy, '<div class="col-md-6 text-sm-right"><div class="entry-terms">', '', '</div></div>'); ?>
	<?php endif ?>
</div>
