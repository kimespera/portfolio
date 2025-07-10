	<footer class="footer">
		<div class="container footer-content">
			<div class="footer-col">&copy; <?php echo date("Y"); ?> Kim Espera</div>
			<div class="footer-col">
				<?php $social_media = get_field('social_media', 'option');
					if ($social_media) : ?>
						<div class="social-media">
							
							<?php foreach ($social_media as $item):
								$link = $item['link'];
								$icon = $item['icon'];
									if( $link ): ?>
										<a href="<?php echo esc_url( $link ); ?>" target="_blank">
											<?php echo $icon; ?>
										</a>
									<?php endif; ?>
							<?php endforeach; ?>
						</div>
				<?php endif; ?>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>