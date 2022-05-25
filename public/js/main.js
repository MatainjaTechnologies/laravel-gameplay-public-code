$( document ).ready(function() {
    $('.slide-competititon').slick({
        infinite: false,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        variableWidth: true,
        infinite: true
      });
    
      $('.content-slider').slick({
        infinite: false,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        variableWidth: true,
        infinite: false
      })

      $('.content-video-wrapper').slick({
        infinite: false,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        variableWidth: true,
        infinite: false
      })

      $('.game-pic-slide').slick({
        infinite: false,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        variableWidth: true,
        infinite: false
      })

      $('#btnPlay').click(function() {
        $('#modalPurchaseOption').modal('show');
      })

      $('#btnExampleModalAlert').click(function() {
        $('#modalPurchaseOption').modal('hide');
        $('#ExampleModalAlert').modal('show');

      })

      $('#inputMsisdn').click(function() {
        $('#modalPurchaseOption').modal('hide');
        $('#ExampleModalAlert').modal('hide');
        $('#InsertPhoneNumber').modal('show');
      })

      $('#btnShowWelcome2').click(function() {
        $('#welcomeSlide1').hide();
        $('#welcomeSlide2').show();
        $('#welcomeSlide3').hide();
      })

      $('#btnShowWelcome3').click(function() {
        $('#welcomeSlide1').hide();
        $('#welcomeSlide2').hide();
        $('#welcomeSlide3').show();
      })

      $('.leaderboard-box-content').each(function () {
        var $ul = $(this),
          $lis = $ul.find('li:gt(2)'),
          isExpanded = $ul.hasClass('expanded');
          $lis[isExpanded ? 'show' : 'hide']();

        if ($lis.length > 0) {
          $ul
            .append($('<div class="leaderboard-box-more"><a href="#" class="btn btn-block main-grey-outline-btn">See More</a></div>')
              .click(function (event) {
                var isExpanded = $ul.hasClass('expanded');
                event.preventDefault();
                // $(this).html(isExpanded ? 'Show More' : 'Show Less');
                $ul.toggleClass('expanded');
                $lis.toggle();
                $('.leaderboard-box-more').hide();
              }));
        }
      });
})

$(window).on('load', function(){
  $('.loading').fadeOut('slow');
});