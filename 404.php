<?php

namespace Openmarco\Seriously\std;

?>

<?php do_action(ACTION_OMT_PAGE_HEADER) ?>

<div class="section section-single">
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'seriously'); ?></p>
					
					<?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
