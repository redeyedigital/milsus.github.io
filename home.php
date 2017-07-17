<?php

namespace Openmarco\Seriously\std;

?>

<?php do_action(ACTION_OMT_PAGE_HEADER) ?>

<div class="section">
    <div class="section-content">
		<?php get_template_part('parts/post/top-bar'); ?>

        <div class="container">
			<?php get_template_part('parts/post/loop'); ?>
        </div>
		
		<?php get_template_part('parts/entry/pagination') ?>
    </div>
</div>
