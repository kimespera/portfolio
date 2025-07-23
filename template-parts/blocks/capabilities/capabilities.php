<?php
	$heading = get_field('heading');
	$description = get_field('description');
	$capabilities = get_field('capabilities');

	// Get the native WordPress anchor value from the block settings
	$anchor_id = $block['anchor'] ?? '';
	$class_name = 'capabilities-block';

	// Append additional class set in editor
	if (!empty($block['className'])) {
		$class_name .= ' ' . $block['className'];
	}

?>
<?php if ($anchor_id) : ?>
	<div id="<?php echo esc_attr($anchor_id); ?>"></div>
<?php endif; ?>

<div class="<?php echo esc_attr($class_name); ?>" data-aos="fade-up">
	<div class="container capabilities-box">
		<div class="capabilities-content">
			<h2><?php echo $heading; ?></h2>
			<p><?php echo $description; ?></p>
		</div>
		<div class="capabilities-list">
			<?php if( $capabilities ) : ?>
				<?php foreach( $capabilities as $item ):
					$tool_or_tech = $item['tool_or_tech']; ?>
					<?php if ($tool_or_tech): ?>
						<div class="capability-item"><?php echo $tool_or_tech; ?></div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>