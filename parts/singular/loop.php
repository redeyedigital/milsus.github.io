<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Service\Post;

?>

<?php while (have_posts()) : the_post() ?>
	<?php get_template_part('parts/singular/default/article') ?>
	
	<?php if (Post::hasCommentsSection()) : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
					<?php comments_template('/parts/entry/comments.php'); ?>
                </div>
            </div>
        </div>
	<?php endif ?>
<?php endwhile; ?>
