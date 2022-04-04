$(function () {
  $('.post__header--link-share').click(function () {
    $('.modal').fadeIn(300);
    $('.modal').toggleClass('active');
  });
});

$(function () {
  $('.modal__crosses').click(function () {
    $('.modal').fadeOut(300);
    $('.modal').removeClass('active');
  });
});