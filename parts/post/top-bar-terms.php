<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;
use Openmarco\Seriously\Html\Helpers;
use Openmarco\Seriously\Service\Posts;

$taxAppearance = Customizer::get(MOD_POSTS_TOP_BAR_TAXONOMY_TYPE);
$termType      = Customizer::get(MOD_POSTS_TOP_BAR_TAXONOMY);

if ($termType === 'tags') {
	$terms        = get_tags();
	$activeTermId = is_tag() ? get_query_var('tag') : 0;
	$termLinkFunc = 'get_tag_link';
} else {
	$terms        = get_categories();
	$activeTermId = is_category() ? get_query_var('cat') : 0;
	$termLinkFunc = 'get_category_link';
}

$blogActive = $activeTermId !== 0 ? '' : 'active';
$postsUrl   = Posts::getUrl();

$navClasses = ['nav', 'nav-inline', 'hidden-sm-down'];
if (Customizer::get(MOD_LS_POSTS_TOP_BAR_ITEM_BG_COLOR) || Customizer::get(MOD_LS_POSTS_TOP_BAR_ITEM_BORDER_COLOR)) {
	$navClasses[] = 'nav-bordered-light';
}
if (Customizer::get(MOD_DS_POSTS_TOP_BAR_ITEM_BG_COLOR) || Customizer::get(MOD_DS_POSTS_TOP_BAR_ITEM_BORDER_COLOR)) {
	$navClasses[] = 'nav-bordered-dark';
}
?>

<?php if ($taxAppearance === 'line') : ?>
    <ul<?php Helpers::classes($navClasses) ?>>
		<?php if ($postsUrl) : ?>
            <li<?php Helpers::classes(['nav-item', $blogActive]) ?>>
                <a<?php Helpers::url('href', $postsUrl) ?>>
					<?php esc_html_e('Latest Articles', 'seriously') ?>
                </a>
            </li>
		<?php endif ?>
		
		<?php foreach ($terms as $term) : ?>
            <li<?php Helpers::classes(['nav-item', $activeTermId === $term->term_id ? 'active' : '']) ?>>
                <a<?php Helpers::url('href', $termLinkFunc($term->term_id)) ?>>
					<?php echo esc_html($term->name) ?>
                </a>
            </li>
		<?php endforeach ?>
    </ul>
<?php endif; ?>

<div<?php Helpers::classes(['omt-relative', $taxAppearance === 'line' ? 'hidden-md-up' : '']) ?>>
    <select class="form-control" title="<?php esc_attr_e('Posts categories', 'seriously') ?>" data-om-cc-category-nav>
		<?php if ($postsUrl) : ?>
            <option<?php Helpers::url('value', $postsUrl) ?><?php selected($activeTermId, 0) ?>>
				<?php esc_html_e('Latest Articles', 'seriously') ?>
            </option>
		<?php endif ?>
		<?php foreach ($terms as $term) : ?>
            <option<?php Helpers::url('value', $termLinkFunc($term->term_id)) ?><?php selected($term->term_id, $activeTermId) ?>>
				<?php echo esc_html($term->name) ?>
            </option>
		<?php endforeach ?>
    </select>
</div>
