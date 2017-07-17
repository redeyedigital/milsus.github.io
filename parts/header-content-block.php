<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Service\Option;
use Openmarco\Seriously\Service\Page;

$type   = Option::get(Page::getCurrentId(), OPTION_HEADER_DISPLAY, 'builtin');
$postId = substr($type, 2);

?>

<header class="page-header entry-header">
	<?php do_action(ACTION_OMT_BEFORE_PAGE_HEADER) ?>
	<?php do_action(ACTION_OMP_CREATIVE_PAGE_HEADER, $postId) ?>
	<?php do_action(ACTION_OMT_BEFORE_PAGE_HEADER) ?>
</header>
