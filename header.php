<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header class="header">
		<div class="container header-content">
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php 
						$logo = get_field('light_logo','option');
						if( $logo ) {
							echo wp_get_attachment_image( $logo, 'full' );
						}
					?>
				</a>
			</div>
			<div id="menu-toggle" class="menu-toggle"></div>
			<?php
				wp_nav_menu(array(
					'after' => '<span></span>',
					'container' => 'nav',
					'container_id' => 'main-navigation',
					'container_class' => 'main-navigation',
					'menu' => '2',
					'menu_id' => 'main-menu',
					'menu_class' => 'main-menu'
					)
				);
			?>
		</div>
	</header>