<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;
use Openmarco\Seriously\Desktop\Sidebar;
use Openmarco\Seriously\Html\Helpers;

$postsTopBar  = Customizer::get(MOD_POSTS_TOP_BAR_TAXONOMY) !== null;
$isSidebar    = Sidebar::active(SIDEBAR_POSTS);
$isSearchForm = Customizer::get(MOD_POSTS_TOP_BAR_SEARCH_ENABLED);

$termsClasses   = ['pb-1'];
$termsClasses[] = $isSidebar ? 'offset-lg-1' : 'offset-lg-2';
$termsClasses[] = $isSearchForm ? 'col-lg-6' : 'col-lg-8';

?>

<?php if ($postsTopBar) : ?>
    <div class="posts-top-bar mb-1">
        <div class="container">

            <div class="row pt-1">
                <div<?php Helpers::classes($termsClasses) ?>>
					<?php get_template_part('parts/post/top-bar-terms'); ?>
                </div>
				
				<?php if ($isSearchForm) : ?>
                    <div class="col-lg-2 pb-1 hidden-md-down">
						<?php get_template_part('parts/post/top-bar-search'); ?>
                    </div>
				<?php endif ?>
            </div>

        </div>
    </div>
<?php endif ?>
