<?php
	$main_content = get_field('content');

	// Get the native WordPress anchor value from the block settings
	$anchor_id = $block['anchor'] ?? '';
	$class_name = 'ft-project-block';

	// Append additional class set in editor
	if (!empty($block['className'])) {
		$class_name .= ' ' . $block['className'];
	}

?>
<?php if ($anchor_id) : ?>
	<div id="<?php echo esc_attr($anchor_id); ?>"></div>
<?php endif; ?>

<div class="<?php echo esc_attr($class_name); ?>">
	<div class="container">
		<?php echo $main_content; ?>
		<?php
			$args = array(
				'post_type'      => 'projects',
				'posts_per_page' => 3,
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC'
			);

			$project_query = new WP_Query($args);

			if ($project_query->have_posts()) : ?>
				<div class="ft-proj-list">
					<?php while ($project_query->have_posts()) : $project_query->the_post(); ?>
						<?php
							$short_description = get_field('short_description', get_the_ID());
							$platform = get_field('platform', get_the_ID());
							$year = get_field('year', get_the_ID());
							$role = get_field('role', get_the_ID());
							$link = get_field('link', get_the_ID());
						?>
						<div class="ft-proj-item">
							<div class="ft-proj-col">
								<?php the_post_thumbnail('full'); ?>
							</div>
							<div class="ft-proj-col">
								<h3><?php the_title(); ?></h3>
								<div class="short-description"><?php echo $short_description; ?></div>
								<div class="platform"><b>Platform : </b><?php echo $platform; ?></div>
								<div class="year"><b>Year : </b><?php echo $year; ?></div>
								<div class="role"><b>Role : </b><?php echo $role; ?></div>
								<a class="link" href="<?php echo esc_url( $link ); ?>" target="_blank">View Project <i class="fa-solid fa-up-right-from-square"></i></a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>

			<?php else : ?>
				<p>No projects found.</p>
			<?php endif;

			wp_reset_postdata();
		?>
		<div class="button-wrap">
			<a class="button" href="<?php echo esc_url( home_url( '/projects/' ) ); ?>">View All Projects</a>
		</div>
	</div>
</div>