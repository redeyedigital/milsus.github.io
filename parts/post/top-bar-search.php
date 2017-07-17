<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="sr-only"><?php esc_html_e('Search for:', 'seriously'); ?></label>

    <span class="prefix-icon">
		<span class="icon ion-search"></span>
	</span>

    <input type="search" value="<?php echo esc_attr(get_search_query()); ?>"
           name="s"
           class="search-field form-control"
           placeholder="<?php esc_attr_e('Type here', 'seriously'); ?>"
           required>

    <button type="submit" class="search-submit sr-only">
		<?php esc_html_e('Search', 'seriously'); ?>
    </button>
</form>
