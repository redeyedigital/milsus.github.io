<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Service\Option;
use Openmarco\Seriously\Service\Page;

$display = Option::get(Page::getCurrentId(), OPTION_FOOTER_DISPLAY);
$postId  = (int)substr($display, 2);

?>

<footer class="content-info">
	<?php do_action(ACTION_OMT_BEFORE_FOOTER); ?>
	<?php do_action(ACTION_OMP_CREATIVE_FOOTER, $postId) ?>
	<?php do_action(ACTION_OMT_AFTER_FOOTER); ?>
</footer>
