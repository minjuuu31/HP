  /*////////////////////////////////////
  TOPへ戻るボタン
  ////////////////////////////////*/
  
  let back = $('#btn_box');

  $(back).hide();
  $(window).scroll(function(){
    if ($(this).scrollTop() > 400) {
      $(back).fadeIn();
    } else {
      $(back).fadeOut();
    }
  });
  $(back).on('click', function(){
    $('body, html').animate({
      scrollTop: 0
    }, 800, 'swing');
    return false;
  });

   /*//////////////////
   hover時のアクション
   /////////////////*/

  $(back).mouseover(function(){
  $('.top_btn').addClass('hover');
  }).mouseout(function(){
  $('.top_btn').removeClass('hover')
});