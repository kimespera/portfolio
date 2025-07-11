<?php
	/**
	 * Template Name: Projects Page
	 */

	get_header();
?>

<main class="main-content projects-page">
	<div class="container">
		<h1><?php the_title(); ?></h1>

		<?php
			// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				// 'paged'          => $paged,
				'post_type'      => 'projects',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC'
			);

			$project_query = new WP_Query($args);

			if ($project_query->have_posts()) : $i = 0; ?>
				<div class="project-list">
					<?php while ($project_query->have_posts()) : $project_query->the_post(); $i++; ?>
						<div class="project-item">
							<a class="proj-img imglightbox" href="#popup-<?php echo $i; ?>"><?php the_post_thumbnail('full'); ?></a>

							<?php
								$short_description = get_field('short_description');
								$platform = get_field('platform');
								$year = get_field('year');
								$role = get_field('role');
								$link = get_field('link');
							?>
							<div id="popup-<?php echo $i; ?>" class="proj-desc">
								<div class="proj-desc-col">
									<?php the_post_thumbnail('full'); ?>
								</div>
								<div class="proj-desc-col">
									<h2><?php the_title(); ?></h2>
									<p class="short-description"><?php echo $short_description; ?></p>
									<p class="platform"><b>Platform : </b><?php echo $platform; ?></p>
									<p class="year"><b>Year : </b><?php echo $year; ?></p>
									<p class="role"><b>Role : </b><?php echo $role; ?></p>
									<a class="button" href="<?php echo esc_url( $link ); ?>" target="_blank">View Project</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>

				<?php
					if ($project_query->max_num_pages > 1) {
						$big = 999999999; // a large number to replace later

						$pagination_links = paginate_links(array(
							'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
							'format'    => '?paged=%#%',
							'current'   => max(1, get_query_var('paged')),
							'total'     => $project_query->max_num_pages,
							'type'      => 'list', // outputs <ul><li> structure for easier styling
							'prev_text' => __('<i class="fa-solid fa-caret-left"></i>', 'portfolio'), // customize text
							'next_text' => __('<i class="fa-solid fa-caret-right"></i>', 'portfolio'), // customize text
							'mid_size'  => 2, // number of pages on either side of current
							'end_size'  => 1, // number of pages at beginning and end
						));

						if ($pagination_links) {
							echo '<nav class="pagination-wrapper" aria-label="Projects Pagination">';
							echo $pagination_links;
							echo '</nav>';
						}
					}
				?>

			<?php else : ?>
				<p>No projects found.</p>
			<?php endif;

			wp_reset_postdata();
		?>
	</div>
</main>

<?php get_footer(); ?>