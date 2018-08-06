export default {
  init() {

  },
  finalize() {
    let contentvisual = $('.content-visual');
    let carouseltitle = $('.carousel-title');
    contentvisual.addClass('active');
    carouseltitle.fadeOut();
    contentvisual.on('click', function() {
     contentvisual.removeClass('active');
     carouseltitle.fadeIn();
    })

    carouseltitle.on('click', function() {
     contentvisual.addClass('active');
     carouseltitle.fadeOut();
    })
  },
};
