export default {
	init() {

	},
	finalize() {
		let excerpt = $('.entry-content.excerpt');
		let text = $('.btn.continue').text();
		
		$('.btn.continue').on('click', function() {
			if($(this).hasClass('toggled')) {
				excerpt.removeClass('active');
				$(this).removeClass('toggled').text(text);
			} else {
				excerpt.addClass('active');
				$(this).addClass('toggled').text('Cerrar');
			}
		})
	},
}