<?php

use \Openmarco\Seriously\Html\Helpers;

/** @var array $field */

$attributes = [
	'type'        => 'text',
	'class'       => ['input-text', 'form-control'],
	'name'        => isset($field['name']) ? $field['name'] : $key,
	'id'          => $key,
	'placeholder' => $field['placeholder'],
	'value'       => isset($field['value']) ? $field['value'] : '',
	'maxlength'   => !empty($field['maxlength']) ? $field['maxlength'] : ''
];

if (!empty($field['required'])) {
	$attributes['required'] = null;
}

?>

<input<?php Helpers::attributes($attributes) ?> />

<?php if (!empty($field['description'])) : ?>
    <small class="description"><?php echo esc_html($field['description']) ?></small>
<?php endif; ?>