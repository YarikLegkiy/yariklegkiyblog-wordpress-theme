// Header-menu

$(function () {
  $('.burger').click(function () {
    $('.header__bottom').slideToggle("medium");
    $('.burger').toggleClass('active');
  });
});