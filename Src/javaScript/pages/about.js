import '../main';

$('.down').click(function(event) {
  event.preventDefault();
  let location = $('.down');
  $('html, body').animate({
    scrollTop: location.offset().top + 55
  });
}); 