<?php

use Openmarco\Seriously\Html\Helpers;

?>

<?php if (has_post_thumbnail()) : ?>
    <a href="<?php the_permalink() ?>" class="entry-thumbnail mb-1" rel="bookmark">
		<?php Helpers::featuredImage(get_the_ID(), ['class' => 'rimg-cover'], 'full') ?>
    </a>
<?php endif; ?>
