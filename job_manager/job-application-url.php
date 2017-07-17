<?php

use \Openmarco\Seriously\Html\Helpers;

/** @var stdClass $apply */

?>
<div class="mb-2">
    <a<?php Helpers::url('href', $apply->url) ?> class="btn btn-primary" target="_blank" rel="nofollow">
		<?php esc_html_e('Apply for job', 'seriously'); ?>
    </a>
</div>