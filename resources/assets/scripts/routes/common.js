export default {
	init() {
		// JavaScript to be fired on all pages
		//NAV stuff
		//$(".nav-primary").hide();
		$(".toggle").on('click', function(e) {
			e.preventDefault();
			$('.nav-primary').addClass('active');
		});

		$(".close").on('click', function(e) {
			e.preventDefault();
			$(".nav-primary").removeClass('active');
		})
	},
	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
