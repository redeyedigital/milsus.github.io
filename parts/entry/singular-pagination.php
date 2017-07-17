<?php

use Openmarco\Seriously\Html\Helpers;
use Openmarco\Seriously\Plugins\Context;
use Openmarco\Seriously\Service\Post;

?>

<?php if (!Context::isVisualComposerPostContent() && Post::isMultipage()) : ?>
    <nav class="post-nav">
        <div>
			<?php echo Helpers::getPostPagination() ?>
        </div>
    </nav>
<?php endif ?>
