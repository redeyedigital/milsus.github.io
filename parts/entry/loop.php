<?php

namespace Openmarco\Seriously\std;

?>

<div class="row">
    <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
		<?php if (!have_posts()) : ?>
            <div class="entries-empty">
				<?php get_search_form() ?>
            </div>
		<?php else : ?>
            <div class="entries-classic">
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('parts/entry/default/article') ?>
					<?php comments_template('/parts/entry/comments.php'); ?>
				<?php endwhile ?>
            </div>
		<?php endif ?>
    </div>
</div>
