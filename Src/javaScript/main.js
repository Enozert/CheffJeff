$(document).ready(function(){
  $('#menuToggle').click(function(){
    $('#menuToggle').toggleClass('active');
    $('.menu-wrapper').toggleClass('active');

    if($('#menuToggle').hasClass('active')){
      $('#menuToggle').attr('aria-expanded', 'true');
    }else{
      $('#menuToggle').attr('aria-expanded', 'false');
    } 
  });
});