<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Service\Posts;
use Openmarco\Seriously\Customizer\Customizer;
use Openmarco\Seriously\Html\Helpers;

?>

<?php if (Posts::hasPagination()) : ?>
	<?php
	$type = Customizer::get(MOD_PAGINATION_TYPE);
	
	$containerClass   = Customizer::get(MOD_PAGINATION_NEXT_PREVIOUS_CONTAINER);
	$pagerClasses     = ['row', 'pager'];
	$pagerPrevClasses = ['col-xs-6', 'pager-prev', 'text-xs-left'];
	$pagerNextClasses = ['col-xs-6', 'pager-next', 'text-xs-right'];
	?>

    <nav class="posts-nav">
        <div<?php Helpers::classes($containerClass) ?>>
			<?php if ($type === 'numbers') : ?>
				<?php
				$items = Posts::getPaginationItems([
					'prev_text' => esc_html__('Previous', 'seriously'),
					'next_text' => esc_html__('Next', 'seriously')
				]);
				
				$pagerClasses[] = 'hidden-sm-up';
				?>
				
				<?php echo Helpers::getPagination($items) ?>
			<?php endif ?>

            <div<?php Helpers::classes($pagerClasses) ?>>
                <div<?php Helpers::classes(apply_filters(FILTER_OMT_PREV_POSTS_CLASSES, $pagerPrevClasses)) ?>>
					<?php previous_posts_link(apply_filters(FILTER_OMT_PREV_POSTS_LINK_LABEL, '')) ?>
                </div>
                <div<?php Helpers::classes(apply_filters(FILTER_OMT_NEXT_POSTS_CLASSES, $pagerNextClasses)) ?>>
					<?php next_posts_link(apply_filters(FILTER_OMT_NEXT_POSTS_LINK_LABEL, '')) ?>
                </div>
            </div>
        </div>
    </nav>
<?php endif ?>
