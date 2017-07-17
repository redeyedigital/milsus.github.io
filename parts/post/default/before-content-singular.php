<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;

?>

<div class="row entry-before-content mb-1">
    <div class="col-md-6">
		<?php get_template_part('parts/entry/default/meta'); ?>
    </div>
	
	<?php if (Customizer::get(MOD_POSTS_PAGE_COMMENTS_LINK_ENABLED)) : ?>
        <div class="col-xs-6 text-xs-right">
			<?php get_template_part('parts/entry/default/comments-link'); ?>
        </div>
	<?php endif ?>
</div>
