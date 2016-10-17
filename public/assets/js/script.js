$(document).ready(function(){
  $('#datepicker').datepicker();
  $('.ui-icon-circle-triangle-w').text("").addClass("ion-arrow-left-b");
  /*$('.selection').click(function(){
    $(this).parent().children().removeClass('select-active')
    $(this).addClass('select-active');
  })*/
  $('.hamburger').click(function(){
    $('.left-sidebar').toggleClass('left-sidebar-active');
    $('.content-area').delay(1000).queue(function(){
      $('.content-area').addClass("content-area-active");
      var that = $( this );
      that.dequeue();
    });
  })

  $('.float-button').click(function(){
    $('.left-sidebar').toggleClass('left-sidebar-active');
    $('.content-area').delay(1000).queue(function(){
      $('.content-area').addClass("content-area-active");
      var that = $( this );
      that.dequeue();
    });
  })

  $('.close-button').on('click', function(){
    $('.left-sidebar').toggleClass('left-sidebar-active');
    $('.content-area').removeClass("content-area-active");
  })
});
