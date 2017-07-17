<?php

namespace Openmarco\Seriously\std;

add_filter(FILTER_OMT_COMMENT_FORM_LABEL, function ($label, $args, $name, $property) {
	return preg_match('/<label for="' . $name . '">([^<]+)</', $args[$property], $matches) ? $matches[1] : $label;
}, 10, 4);

add_action(ACTION_WP_ENQUEUE_SCRIPTS, function () {
	if (is_singular()) {
		wp_enqueue_script('comment-reply');
	}
});

add_filter(FILTER_WP_EDIT_COMMENT_LINK, function ($link) {
	return str_replace('comment-edit-link', 'comment-edit-link btn btn-sm btn-secondary', $link);
});

add_filter(FILTER_WP_COMMENT_REPLY_LINK, function ($link) {
	return str_replace('comment-reply-link', 'comment-reply-link btn btn-sm btn-secondary', $link);
});

add_filter(FILTER_WP_COMMENT_FORM_DEFAULT_FIELDS, function (array $fields) {
	$commenter      = wp_get_current_commenter();
	$req            = get_option('require_name_email');
	$labelReq       = ($req ? ' <span class="required">*</span>' : '');
	$placeholderReq = ($req ? '*' : '');
	$htmlReq        = ($req ? ' aria-required="true" required="required"' : '');
	
	$author = apply_filters(FILTER_OMT_COMMENT_FORM_LABEL, '', $fields, 'author', 'author');
	$email  = apply_filters(FILTER_OMT_COMMENT_FORM_LABEL, '', $fields, 'email', 'email');
	$url    = apply_filters(FILTER_OMT_COMMENT_FORM_LABEL, '', $fields, 'url', 'url');
	
	$fields = [
		'author' => '<div class="col-md-4"><div class="form-group"><label class="sr-only" for="author">' . $author . $labelReq . '</label><input id="author" name="author" class="form-control" type="text" placeholder="' . $author . $placeholderReq . '" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $htmlReq . ' /></div></div>',
		'email'  => '<div class="col-md-4"><div class="form-group"><label class="sr-only" for="email">' . $email . $labelReq . '</label><input id="email" name="email" class="form-control" type="email" placeholder="' . $email . $placeholderReq . '" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-describedby="email-notes"' . $htmlReq . ' /></div></div>',
		'url'    => '<div class="col-md-4"><div class="form-group"><label class="sr-only" for="url">' . $url . '</label><input id="url" name="url" class="form-control" type="url" placeholder="' . $url . '" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div></div>',
	];
	
	return $fields;
});

add_filter(FILTER_WP_COMMENT_FORM_DEFAULTS, function (array $defaults) {
	$user         = wp_get_current_user();
	$userIdentity = $user->exists() ? $user->display_name : '';
	$userAvatar   = $user->exists() ? get_avatar($user->ID, 44) : '';
	
	$comment = apply_filters(FILTER_OMT_COMMENT_FORM_LABEL, '', $defaults, 'comment', 'comment_field');
	
	$fields = $defaults['fields'];
	if ($defaults['comment_notes_before']) {
		$fields[] = '<div class="col-md-12 text-xs-center text-muted">' . $defaults['comment_notes_before'] . '</div>';
	}
	
	$settings = array_merge($defaults, [
		'comment_notes_before' => '',
		
		'logged_in_as'  => '<div class="col-md-12"><div class="logged-in-as">' . $userAvatar . '<a class="comment-reply-user" href="' . admin_url('profile.php') . '">' . $userIdentity . '</a>' . '<a class="comment-reply-logout" href="' . wp_logout_url(apply_filters(FILTER_WP_THE_PERMALINK, get_permalink())) . '" title="' . esc_attr__('Log out of this account', 'seriously') . '"><span class="ion-log-out"></span></a>' . '</div></div>',
		'comment_field' => '<div class="col-md-12"><div class="form-group"><label class="sr-only" for="comment">' . $comment . '</label><textarea id="comment" name="comment" class="form-control" placeholder="' . $comment . '" rows="3" aria-required="true"></textarea></div></div>',
		
		'fields' => $fields,
		
		//'comment_notes_after' => '',
		
		'submit_field' => '<div class="col-md-12"><p class="form-submit">%1$s %2$s</p></div>',
		'class_submit' => 'btn btn-flat btn-primary'
	]);
	
	return $settings;
});

add_filter(FILTER_OMT_NEXT_COMMENTS_LINK_LABEL, function () {
	$text  = esc_html__('Newer comments', 'seriously');
	$arrow = apply_filters(FILTER_OMT_ARROW_RIGHT, '');
	
	return "$text $arrow";
});

add_filter(FILTER_OMT_PREV_COMMENTS_LINK_LABEL, function () {
	$text  = esc_html__('Older comments', 'seriously');
	$arrow = apply_filters(FILTER_OMT_ARROW_LEFT, '');
	
	return "$arrow $text";
});

add_action(ACTION_WP_COMMENT_FORM_TOP, function () {
	echo '<div class="row">';
});

add_action(ACTION_WP_COMMENT_FORM, function () {
	echo '</div>';
});