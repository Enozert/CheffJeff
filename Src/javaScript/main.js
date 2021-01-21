$(document).ready(function(){
  if(localStorage.getItem('lang')){
    $('#'+localStorage.getItem('lang')).addClass('active');
  }else{
    $('#UK').addClass('active');
    localStorage.setItem('lang', 'UK');
  }

  $('#menuToggle').click(function(){
    $('#menuToggle').toggleClass('active');
    $('.menu-wrapper').toggleClass('active');

    if($('#menuToggle').hasClass('active')){
      $('#menuToggle').attr('aria-expanded', 'true');
    }else{
      $('#menuToggle').attr('aria-expanded', 'false');
    } 
  });

  $('.settings-btn').hover(function(){
    $('.settings').addClass('open');
  });
  $('.settings').hover(function(){
    $(this).addClass('open');
  });
  $('.settings-btn').mouseleave(function(){
    $('.settings').removeClass('open');
  });
  $('.settings').mouseleave(function(){
    $(this).removeClass('open');
  });

  $('.btnLang').click(function(){
    let id = $(this)[0].id;
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '/src/php/setLang.php?lang=' + id, true);
    xhr.onload = function() {
      if(this.status == 200){
        localStorage.setItem('lang', id);
        $('.btnLang').removeClass('active');
        $('#'+localStorage.getItem('lang')).addClass('active');
        console.log(this.responseText);
      }
    }
    xhr.send();
    location.reload();
  });
});