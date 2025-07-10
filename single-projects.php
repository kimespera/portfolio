<?php get_header(); ?>

	<main class="main-content single-project">
		<div class="container">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php
					$short_description = get_field('short_description');
					$platform = get_field('platform');
					$year = get_field('year');
					$role = get_field('role');
					$link = get_field('link');
				?>
				<h1><?php the_title(); ?></h1>
				<div class="proj-img">
					<?php the_post_thumbnail('full'); ?>
				</div>
				<p class="short-description"><?php echo $short_description; ?></p>
				<p class="platform"><b>Platform : </b><?php echo get_field('platform'); ?></p>
				<p class="year"><b>Year : </b><?php echo $year; ?></p>
				<p class="role"><b>Role : </b><?php echo $role; ?></p>
				<a class="button" href="<?php echo esc_url( $link ); ?>" target="_blank">Live Demo</a>
			<?php endwhile; endif; ?>
		</div>
	</main>

<?php get_footer(); ?>