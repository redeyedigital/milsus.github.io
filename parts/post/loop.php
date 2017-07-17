<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Desktop\Sidebar;
use Openmarco\Seriously\Html\Helpers;
use Openmarco\Seriously\Service\Posts;

$isSidebar = Sidebar::active(SIDEBAR_POSTS);

$mainClasses = ['col-md-10', 'col-lg-8', 'offset-md-1'];
if (!$isSidebar) {
	$mainClasses[] = 'offset-lg-2';
}

$entriesClasses   = ['entries-classic'];
$entriesClasses[] = Posts::hasPagination() ? 'has-pagination' : 'no-pagination';

?>

<div class="row">
    <div<?php Helpers::classes($mainClasses) ?>>
		<?php if (!have_posts()) : ?>
            <div class="entries-empty">
				<?php get_search_form() ?>
            </div>
		<?php else : ?>
            <div<?php Helpers::classes($entriesClasses) ?>>
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('parts/post/default/article') ?>
					<?php comments_template('/parts/entry/comments.php'); ?>
				<?php endwhile ?>
            </div>
		<?php endif ?>
    </div>
	
	<?php if ($isSidebar) : ?>
        <div class="clearfix hidden-lg-up"></div>
        <div class="col-lg-3">
            <aside class="posts-sidebar">
				<?php Sidebar::get(SIDEBAR_POSTS)->render(); ?>
            </aside>
        </div>
	<?php endif ?>
</div>
