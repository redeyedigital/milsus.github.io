<?php

use \Openmarco\Seriously\Html\Helpers;

/** @var stdClass $apply */

?>
<div class="btn-group mb-2">
    <a class="btn btn-primary"<?php Helpers::url('href', 'mailto:' . $apply->email . '?subject=' . urlencode($apply->subject)) ?>>
		<?php esc_html_e('Apply for job', 'seriously'); ?>
    </a>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
		<span class="sr-only">
			<?php esc_html_e('Toggle mail options', 'seriously'); ?>
        </span>
    </button>

    <div class="dropdown-menu">
        <a class="dropdown-item"<?php Helpers::url('href', 'mailto:' . $apply->email . '?subject=' . urlencode($apply->subject)) ?>>
			<?php esc_html_e('Mail to', 'seriously') ?>
			<?php echo esc_html($apply->email) ?>
        </a>
        <a class="dropdown-item"<?php Helpers::url('href', 'https://mail.google.com/mail/?view=cm&fs=1&to=' . $apply->email . '&su=' . urlencode($apply->subject)) ?>
           target="_blank">
            <?php esc_html_e('Gmail', 'seriously') ?>
        </a>
        <a class="dropdown-item"
           <?php Helpers::url('href', 'http://webmail.aol.com/Mail/ComposeMessage.aspx?to=' . $apply->email . '&subject=' . urlencode($apply->subject)) ?>
           target="_blank">
            <?php esc_html_e('AOL', 'seriously') ?>
        </a>
        <a class="dropdown-item"
           <?php Helpers::url('href', 'http://compose.mail.yahoo.com/?to=' . $apply->email . '&subject=' . urlencode($apply->subject)) ?>
           target="_blank">
            <?php esc_html_e('Yahoo', 'seriously') ?>
        </a>
        <a class="dropdown-item"
           <?php Helpers::url('href', 'http://mail.live.com/mail/EditMessageLight.aspx?n=&to=' . $apply->email . '&subject=' . urlencode($apply->subject)) ?>
           target="_blank">
            <?php esc_html_e('Outlook', 'seriously') ?>
        </a>
    </div>
</div>
