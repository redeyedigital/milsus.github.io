<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;

$isAuthor = Customizer::get(MOD_POSTS_PAGE_AUTHOR_ENABLED);
$authorId = get_the_author_meta('ID');

?>

<div class="entry-meta">
	<?php if (Customizer::get(MOD_POSTS_PAGE_AVATAR_ENABLED)) : ?>
		<?php echo get_avatar($authorId, 96) ?>
	<?php endif ?>
	
	<?php if ($isAuthor) : ?>
        <span class="byline author vcard">
		<span class="hidden-xs-down">
			<?php esc_attr_e('By', 'seriously') ?>
		</span>
		<a href="<?php echo get_author_posts_url($authorId); ?>" rel="author" class="fn">
			<?php echo get_the_author(); ?>
		</a>
	</span>
	<?php endif ?>
	
	<?php if (Customizer::get(MOD_POSTS_PAGE_DATE_ENABLED)) : ?>
        <span class="post-date">
            <span class="hidden-xs-down">
            <?php if ($isAuthor) : ?>
	            <?php esc_attr_e('on', 'seriously') ?>
            <?php else : ?>
	            <?php esc_attr_e('On', 'seriously') ?>
            <?php endif ?>
            </span>
            <time class="updated" datetime="<?php echo esc_attr(get_the_time('c')) ?>">
                <?php echo get_the_date() ?>
            </time>
        </span>
	<?php endif ?>
</div>
		