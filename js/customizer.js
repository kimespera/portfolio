/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	$('#main-menu').slicknav({
		label: '',
		prependTo:'#menu-toggle',
		closeOnClick: true,
		allowParentLinks: true,
		closedSymbol: '',
		openedSymbol: '',
	});

	const items = $('.project-item');
	const itemsPerLoad = 3;
	let currentVisible = 9;

	// Initially hide all and show the first set
	items.hide().slice(0, currentVisible).show();

	$(window).on('scroll', function() {
		if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
			// Load next batch
			currentVisible += itemsPerLoad;
			items.slice(0, currentVisible).fadeIn();
		}
	});

	const lightbox = GLightbox({
		selector: '.imglightbox',
		height: 'auto'
	});
}( jQuery ) );
