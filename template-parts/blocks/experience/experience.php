<?php
	$heading = get_field('heading');
	$description = get_field('description');
	$lists = get_field('list');

	// Get the native WordPress anchor value from the block settings
	$anchor_id = $block['anchor'] ?? '';
	$class_name = 'experience-block';

	// Append additional class set in editor
	if (!empty($block['className'])) {
		$class_name .= ' ' . $block['className'];
	}

?>
<?php if ($anchor_id) : ?>
	<div id="<?php echo esc_attr($anchor_id); ?>"></div>
<?php endif; ?>

<div class="<?php echo esc_attr($class_name); ?>">
	<div class="container experience-box">
		<div class="experience-content">
			<h2><?php echo $heading; ?></h2>
			<p><?php echo $description; ?></p>
		</div>
		<div class="experience-list">
			<?php if( $lists ) : ?>
				<?php foreach( $lists as $list ):
					$position = $list['position'];
					$company_name = $list['company_name'];
					$year = $list['year'];
					$description = $list['description']; ?>
					<div class="experience-item">

						<?php if ($position || $year): ?>
							<div class="position-year">
								<h5><?php echo $position; ?></h5>
								<span><?php echo $year; ?></span>
							</div>
						<?php endif; ?>

						<?php if ($company_name): ?>
							<div class="company"><?php echo $company_name; ?></div>
						<?php endif; ?>

						<?php if ($description): ?>
							<div class="description"><?php echo wp_kses_post($description); ?></div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>