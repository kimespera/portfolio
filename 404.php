<?php get_header(); ?>
	<main class="main-content error-404 not-found">
		<div class="container">
			<h1>Oops! That page can&rsquo;t be found.</h1>
			<p>It looks like nothing was found at this location. Go to <a href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage</a>.</p>
		</div>
	</main>
<?php
get_footer();