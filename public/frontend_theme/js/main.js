$( document ).ready(function() {
    $('.slider-standard').slick({
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      variableWidth: false,
      infinite: true
    });
    
    $('.slider-varwidth').slick({
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      variableWidth: true,
      infinite: true
    })

    var bottomNavHeight = $('.bottom-nav').outerHeight();
    if ($('.bottom-nav').length) {
      $('.content-wrapper').css('padding-bottom', bottomNavHeight);
    } 

})

$(window).on('load', function(){
  $('.loading').fadeOut('slow');
});