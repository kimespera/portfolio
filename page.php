<?php get_header(); ?>

	<main class="main-content">

		<div class="container">
			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile;
			?>
		</div>

	</main><!-- #main -->

<?php
get_footer();