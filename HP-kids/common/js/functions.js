;$(function(){
  'use strict';

  /*//////////////////////////////////////////
  ロード画面
 ///////////////////////////////////////////*/

  $(document).ready(function(){
    $('#home').hide();

    setTimeout(function(){
      //処理
      $('#home').fadeIn(3000);
      $('#top').fadeOut(2000);
  
     },2000);
    });


  /*///////////////////////////////////////////////
  スライドショー部分
  ///////////////////////////////////////////////*/
   
  // 〇の設定(画像を連動)
  $('.slide_item').each(function(){
    $('#paging').append($('<li></li>').attr('date-img', $('img', this).attr('src')));
  });

  // 〇を●にする
  $('#paging > li:first-child').addClass('active');


  // 自動スライド機能を実行
  let timerID = setInterval(function(){
    $('#arrow .next').click();
  }, 6000);

  // カーソルが画像に乗っている時、→ボタンを出す
  $('#slide').hover(function(){
    $('#arrow').show();
    clearInterval(timerID);
  }, function(){
    $('#arrow').hide();
      timerID = setInterval(function(){
        $('#arrow .next').click();
      }, 6000);
  });

  // 矢印ボタンをクリックした時
  $('#arrow > .next').on('click', function(){
    $('#slide_list:not(:animated)').animate({
      'margin-left' : (-1 * $('.slide_item').width()) + 'px'
    }, function(){
      $('#slide_list').css('margin-left', '0');
      $('#slide_list').append($('.slide_item:first-child'));
      $('#paging > li.active').removeClass('active');
      $('#paging > li[date-img="'+ $('.slide_item:first-child img').attr('src') + '"]').addClass('active');
    });
  });


  $('#arrow > .prev').on('click', function(){
    $('#slide_list:not(:animated)').css('margin-left', (-1 * $('.slide_item').width())).prepend($('.slide_item:last-child')).animate({
      'margin-left' : '0'
    }, function(){
      $('#paging > li.active').removeClass('active');
      $('#paging > li[date-img="'+ $('.slide_tem:first-child img').attr('src') +'"]').addClass('active');
    });
  });


  $('.oshirase_item > a').on('click', function(){
    $(this).css(
      'color', '#005');
  });


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

});