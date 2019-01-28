export default {
	init() {

	},
	finalize() {
		let excerpt = $('.entry-content.excerpt');
		let text = $('.btn.show-intro').text();
		let fullcontent = $('.editorial-numero .content-main');

		fullcontent.hide();
		
		$('.btn.show-intro').on('click', function() {
			if($(this).hasClass('toggled')) {
				excerpt.removeClass('active');
				$(this).removeClass('toggled').text(text);
				fullcontent.slideUp();
			} else {
				excerpt.addClass('active');
				fullcontent.slideDown();
				$(this).addClass('toggled').text('Cerrar');
			}
		});
	},
}