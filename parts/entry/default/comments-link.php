<?php if (comments_open() && !post_password_required()) : ?>
    <span class="comments-link">
	<?php if (get_comments_number()) : ?>
        <a href="<?php comments_link() ?>"><?php comments_number() ?></a>
	<?php else : ?>
		<?php comments_popup_link(esc_html__('Leave a Comment', 'seriously')) ?>
	<?php endif ?>
	</span>
<?php endif ?>
