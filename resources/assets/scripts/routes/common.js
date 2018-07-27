export default {
	init() {
		// JavaScript to be fired on all pages
		//NAV stuff
		$(".nav-primary").hide();
		$(".toggle").on('click', function() {
			$('.nav-primary').show();
		});

		$(".close").on('click', function() {
			$(".nav-primary").hide();
		})
	},
	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
