<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;

$taxonomy = Customizer::get(MOD_POST_TAXONOMY);

?>

<?php if ($taxonomy !== null && taxonomy_exists($taxonomy)) : ?>
    <div class="row entry-after-content">
		<?php echo get_the_term_list(get_the_ID(), $taxonomy, '<div class="col-md-12"><div class="entry-terms">', '', '</div></div>'); ?>
    </div>
<?php endif ?>
