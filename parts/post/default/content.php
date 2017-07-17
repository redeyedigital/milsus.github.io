<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;

$content = Customizer::get(MOD_POSTS_PAGE_CONTENT)

?>

<?php if ('none' !== $content) : ?>
    <div class="entry-summary">
		<?php if ($content === 'excerpt') : ?>
			<?php the_excerpt(); ?>
		<?php else : ?>
			<?php the_content(); ?>
		<?php endif ?>
    </div>
<?php endif ?>
