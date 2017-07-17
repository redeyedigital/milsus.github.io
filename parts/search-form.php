<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="sr-only"><?php esc_html_e('Search for:', 'seriously'); ?></label>

    <div class="input-group">
        <input type="search" value="<?php echo esc_attr(get_search_query()); ?>"
               name="s"
               class="search-field form-control"
               placeholder="<?php esc_attr_e('Type here', 'seriously'); ?>"
               required>
        <span class="input-group-btn">
            <button type="submit" class="search-submit btn btn-primary">
	            <?php esc_html_e('Search', 'seriously'); ?>
            </button>
        </span>
    </div>
</form>
