<?php
	$form_position = get_field('form_position');
	$content = get_field('content');
	$form_shortcode = get_field('form_shortcode');

	// Get the native WordPress anchor value from the block settings
	$anchor_id = $block['anchor'] ?? '';
	$class_name = 'form-block ' . $form_position;

	// Append additional class set in editor
	if (!empty($block['className'])) {
		$class_name .= ' ' . $block['className'];
	}

?>
<?php if ($anchor_id) : ?>
	<div id="<?php echo esc_attr($anchor_id); ?>"></div>
<?php endif; ?>

<div class="<?php echo esc_attr($class_name); ?>">
	<div class="container form-content">
		<div class="form-col"><?php echo $content; ?></div>
		<div class="form-col"><?php echo do_shortcode($form_shortcode); ?></div>
	</div>
</div>