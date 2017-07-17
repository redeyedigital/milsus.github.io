<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;
use Openmarco\Seriously\Html\Helpers;
use Openmarco\Seriously\Service\Post;

$content  = Customizer::get(MOD_POSTS_PAGE_CONTENT);
$moreLink = get_permalink() . ($content === 'content' ? '#more-' . get_the_ID() : '');

?>

<div class="row entry-after-content mt-1">
    <div class="col-xs-6">
		<?php if (Customizer::get(MOD_POSTS_PAGE_READ_MORE_ENABLED) && (Post::hasMoreLink() || $content !== 'content')) : ?>
            <a<?php Helpers::url('href', $moreLink) ?> title="<?php the_title_attribute() ?>">
				<?php esc_html_e('Read more', 'seriously') ?>
				<?php echo apply_filters(FILTER_OMT_ARROW_RIGHT, '') ?>
            </a>
		<?php endif ?>
    </div>
	
	<?php if (Customizer::get(MOD_POSTS_PAGE_COMMENTS_LINK_ENABLED)) : ?>
        <div class="col-xs-6 text-xs-right">
			<?php get_template_part('parts/entry/default/comments-link'); ?>
        </div>
	<?php endif ?>
</div>
