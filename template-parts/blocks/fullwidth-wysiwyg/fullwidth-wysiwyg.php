<?php
	$wyiswyg = get_field('wyiswyg');

	// Get the native WordPress anchor value from the block settings
	$anchor_id = $block['anchor'] ?? '';
	$class_name = 'wyiswyg-block';

	// Append additional class set in editor
	if (!empty($block['className'])) {
		$class_name .= ' ' . $block['className'];
	}

?>
<?php if ($anchor_id) : ?>
	<div id="<?php echo esc_attr($anchor_id); ?>"></div>
<?php endif; ?>

<div class="<?php echo esc_attr($class_name); ?>" data-aos="fade-up">
	<div class="container">
		<?php echo $wyiswyg; ?>
	</div>
</div>