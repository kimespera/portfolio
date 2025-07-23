/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

particlesJS('particles-js', {
	"particles": {
		"number": { "value": 80 },
		"color": { "value": "#ffffff" },
		"shape": { "type": "circle" },
		"opacity": { "value": 0.2 },
		"size": { "value": 3 },
		"line_linked": {
			"enable": true,
			"distance": 150,
			"color": "#ffffff",
			"opacity": 0.1,
			"width": 1
		},
		"move": { "enable": true, "speed": 2 }
	},
	"interactivity": {
		"detect_on": "canvas",
		"events": {
			"onhover": { "enable": true, "mode": "grab" },
			"onclick": { "enable": true, "mode": "push" }
		},
		"modes": {
			"grab": { "distance": 140, "line_linked": { "opacity": 1 } },
			"push": { "particles_nb": 4 }
		}
	},
	"retina_detect": true
});

AOS.init();

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
