<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Html\Helpers;
use Openmarco\Seriously\Service\Posts;

$entriesClasses   = ['search-entries'];
$entriesClasses[] = Posts::hasPagination() ? 'has-pagination' : 'no-pagination';

?>

<div class="section">
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">

                    <div class="search-form mt-1 mb-1">
						<?php get_search_form(); ?>
                    </div>

                    <header class="search-header mt-3 mb-3">
                        <h1 class="h3">
							<?php if (!have_posts()) : ?>
								<?php esc_html_e('Sorry, no results for', 'seriously'); ?>
							<?php else : ?>
								<?php esc_html_e('Search results for', 'seriously'); ?>
							<?php endif ?>
                            &#8220;<?php the_search_query() ?>&#8221;
                        </h1>
                    </header>

                    <div<?php Helpers::classes($entriesClasses) ?>>
						<?php while (have_posts()) : the_post(); ?>
                            <article <?php post_class('search-entry-item'); ?>>
                                <header class="entry-header">
                                    <h2 class="entry-title h5">
                                        <a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark">
											<?php if (!get_the_title()) : ?>
												<?php esc_html_e('No title', 'seriously') ?>
											<?php else : ?>
												<?php the_title() ?>
											<?php endif ?>
                                        </a>

                                        <small class="text-muted text-nowrap">
											<?php echo esc_html(substr(get_permalink(), strlen(get_home_url()))) ?>
                                        </small>
                                    </h2>
                                </header>
                            </article>
						<?php endwhile ?>
                    </div>
                </div>
            </div>
        </div>
		
		<?php get_template_part('parts/entry/pagination') ?>
    </div>
</div>
