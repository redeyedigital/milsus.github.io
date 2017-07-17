<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Template\Layout;

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes() ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head() ?>
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/g/html5shiv,respond"></script>
    <![endif]-->
</head>
<body <?php body_class('body-hidden'); ?> data-spy="scroll" data-target="nav.navbar" data-offset="150">

<?php
/**
 * @hooked Splash           - priority 10 /inc/main/theme
 * @hooked Navigation bar   - priority 20 /inc/main/theme
 */
do_action(ACTION_OMT_BEFORE_CONTENT);
?>

<div class="wrap" role="document">
	<?php Layout::body() ?>
</div>

<?php
/**
 * @hooked Footer   - priority 100 /inc/main/theme
 */
do_action(ACTION_OMT_AFTER_CONTENT);
?>

<?php wp_footer() ?>
</body>
</html>