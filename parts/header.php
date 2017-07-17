<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Html\Helpers;

$type = apply_filters(FILTER_OMT_CONTENT_HEADER_TYPE, 'builtin');

?>

<header<?php Helpers::classes(['page-header', 'entry-header', $type === 'invisible' ? 'sr-only' : '']) ?>>
	<?php do_action(ACTION_OMT_BEFORE_PAGE_HEADER) ?>

    <div class="section section-double">
        <div class="section-content">
            <div class="container text-xs-center">
                <h1 class="page-title entry-title">
					<?php Helpers::pageTitle(); ?>
                </h1>
            </div>
        </div>
    </div>
	
	<?php do_action(ACTION_OMT_BEFORE_PAGE_HEADER) ?>
</header>
