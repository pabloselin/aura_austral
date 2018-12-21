export default {
	init() {

	},
	finalize() {
		let excerpt = $('.entry-content.excerpt');
		let text = $('.btn.continue').text();
		let fullcontent = $('.entry-content.excerpt .fullcontent');

		fullcontent.hide();
		
		$('.btn.continue').on('click', function() {
			if($(this).hasClass('toggled')) {
				excerpt.removeClass('active');
				$(this).removeClass('toggled').text(text);
				fullcontent.hide();
			} else {
				excerpt.addClass('active');
				fullcontent.show();
				$(this).addClass('toggled').text('Cerrar');
			}
		});
	},
}