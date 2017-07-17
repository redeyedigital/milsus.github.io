<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Service\Post;

?>

<?php if (Post::hasCommentsSection()) : ?>
	<?php do_action(ACTION_OMT_BEFORE_COMMENTS); ?>

    <section id="comments" class="comments<?php if (get_option('show_avatars')) : echo ' comments-avatars'; endif ?>">
		<?php if (have_comments()) : ?>
            <h2 class="comments-header">
				<?php printf(_nx('One response', '%1$s responses', get_comments_number(), 'comments title', 'seriously'), number_format_i18n(get_comments_number())) ?>
            </h2>

            <ol class="comment-list">
				<?php wp_list_comments(['style' => 'ol', 'short_ping' => true, 'avatar_size' => 48]) ?>
            </ol>
			
			<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                <nav>
                    <div class="row pager">
                        <div class="col-xs-6 pager-prev">
							<?php previous_comments_link(apply_filters(FILTER_OMT_PREV_COMMENTS_LINK_LABEL, '')) ?>
                        </div>
                        <div class="col-xs-6 pager-next text-xs-right">
							<?php next_comments_link(apply_filters(FILTER_OMT_NEXT_COMMENTS_LINK_LABEL, '')) ?>
                        </div>
                    </div>
                </nav>
			<?php endif ?>
		<?php endif ?>
		
		<?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
            <div class="alert alert-warning">
				<?php esc_html_e('Comments are closed.', 'seriously') ?>
            </div>
		<?php endif ?>
		
		<?php comment_form() ?>
    </section>
	
	<?php do_action(ACTION_OMT_AFTER_COMMENTS); ?>

<?php endif ?>
