<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Desktop\Sidebar;

?>

<?php if (Sidebar::active(SIDEBAR_FOOTER)) : ?>
    <footer class="content-info">
		<?php do_action(ACTION_OMT_BEFORE_FOOTER); ?>

        <div class="content-info-content text-xs-center">
            <div class="container">
				<?php Sidebar::get(SIDEBAR_FOOTER)->render(); ?>
            </div>
        </div>
		
		<?php do_action(ACTION_OMT_AFTER_FOOTER); ?>
    </footer>
<?php endif; ?>
