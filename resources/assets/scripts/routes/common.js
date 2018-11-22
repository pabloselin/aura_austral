export default {
	init() {
		// JavaScript to be fired on all pages
		//NAV stuff
		//$(".nav-primary").hide();
		$(".toggle").on('click', function(e) {
			e.preventDefault();
			$('.nav-primary').addClass('active');
			$('body').addClass('menuopen');
		});

		$(".close").on('click', function(e) {
			e.preventDefault();
			$(".nav-primary").removeClass('active');
			$('body').removeClass('menuopen');
		})
	},
	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
		$(".single .entry-content img").removeAttr("width").removeAttr("height");
	},
};
