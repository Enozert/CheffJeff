import '../main';

$('.down').click((event) => {
  event.preventDefault();
  
  let location = $('.down');
  $('html, body').animate({
    scrollTop: location.offset().top + 55
  });
}); 