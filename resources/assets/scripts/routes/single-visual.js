import Hammer from 'hammerjs';

export default {
  init() {
    $('#aura_carousel').each(function () {
        var $carousel = $(this);
        var hammertime = new Hammer(this, {
            recognizers: [
                [Hammer.Swipe, { direction: Hammer.DIRECTION_HORIZONTAL }],
            ],
        });
        hammertime.on('swipeleft', function () {
            $carousel.carousel('next');
        });
        hammertime.on('swiperight', function () {
            $carousel.carousel('prev');
        });
    });
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
