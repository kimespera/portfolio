<?php
	$image_position = get_field('image_position');
	$section_heading = get_field('section_heading');
	$content = get_field('content');
	$image = get_field('image');
	$image_type = get_field('image_type');
	$button = get_field('button');

	// Get the native WordPress anchor and custom class
	$anchor_id  = $block['anchor'] ?? '';
	$class_name = 'content-img-block ' . $image_position;

	// Append additional class set in editor
	if (!empty($block['className'])) {
		$class_name .= ' ' . $block['className'];
	}
	
?>
<?php if ($anchor_id) : ?>
	<div id="<?php echo esc_attr($anchor_id); ?>"></div>
<?php endif; ?>

<div class="<?php echo esc_attr($class_name); ?>">
	<div class="container content-img-box">
		<?php if($section_heading): ?>
			<h2 class="content-img-heading">
				<?php echo $section_heading; ?>
			</h2>
		<?php endif; ?>
		<div class="content-img-col">
			<?php echo $content; ?>
			<?php
				if( $button ): 
					$button_url = $button['url'];
					$button_title = $button['title'];
					$button_target = $button['target'] ? $button['target'] : '_self'; ?>
						<a class="button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
			<?php endif; ?>
		</div>
		<div class="content-img-col image-wrap <?php echo $image_type; ?>">
			<?php echo wp_get_attachment_image( $image, 'full' ); ?>
		</div>
	</div>
</div>