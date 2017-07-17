<?php if ($apply = get_the_job_application_method()) : ?>
	<?php wp_enqueue_script('wp-job-manager-job-application'); ?>
    <div class="job_application application seriously">
		<?php do_action('job_application_start', $apply); ?>
		
		<?php
		/**
		 * job_manager_application_details_email or job_manager_application_details_url hook
		 */
		do_action('job_manager_application_details_' . $apply->type, $apply);
		?>
		
		<?php do_action('job_application_end', $apply); ?>
    </div>
<?php endif; ?>
