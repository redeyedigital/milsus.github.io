<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Html\Helpers;
use Openmarco\Seriously\Plugins\Context;

?>

<article <?php post_class(); ?>>
	<?php do_action(ACTION_OMT_PAGE_HEADER) ?>

    <div class="sr-only">
		<?php get_template_part('parts/entry/meta'); ?>
    </div>

    <div<?php Helpers::classes(['section', Context::isVisualComposerPostContent() ? '' : 'section-single']) ?>>
        <div class="section-content">
            <div class="container">
				<?php get_template_part('parts/entry/default/content-singular') ?>
            </div>
        </div>
    </div>
	
	<?php get_template_part('parts/entry/singular-pagination') ?>
</article>
