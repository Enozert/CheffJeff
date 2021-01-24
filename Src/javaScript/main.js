$(document).ready(function(){
  $('#menuToggle').click(function(){
    if($('.settings').hasClass('open')){
      $('.settings').removeClass('open');
    }

    $('#menuToggle').toggleClass('active');
    $('.menu-wrapper').toggleClass('active');

    if($('#menuToggle').hasClass('active')){
      $('#menuToggle').attr('aria-expanded', 'true');
    }else{
      $('#menuToggle').attr('aria-expanded', 'false');
    } 
  });

  if ($(window).width() > 991) {
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
  }
  else {
    $('.settings-btn').click(function() {
      if($('#menuToggle').hasClass('active')){
        $('#menuToggle').removeClass('active');
      }
      if($('.menu-wrapper').hasClass('active')){
        $('.menu-wrapper').removeClass('active');
      }

      if($('.settings').hasClass('open')){
        $('.settings').removeClass('open');
      }else{
        $('.settings').addClass('open');
      }
    });
    $('.settings-btn').mouseleave(function(){
      $('.settings').removeClass('open');
    });
  }

  $('.btnLang').click(function(){
    let id = $(this)[0].id;
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '/src/php/setLang.php?lang=' + id, true);
    xhr.onload = function() {
      if(this.status == 200){
        localStorage.setItem('lang', id);
        $('.btnLang').removeClass('active');
        $('#'+localStorage.getItem('lang')).addClass('active');
      }
    }
    xhr.send();
    let url = window.location.href;
    let lang = id.toLowerCase();
    let page = '';

    switch(url.split('/')[3]){
      case 'nl':
        if(lang == 'uk'){
          url = url.replace(url.split('/')[3], '');
          arrUrl = url.split('');
          amount = arrUrl.length;
          let a = false;
          let b = false;
          for(let i = 0; i < amount; i++){
            if(arrUrl[i] == '/'){
              if(!a){
                a = true; 
              }else if(!b){
                b = true;
              }else{
                arrUrl.splice(i, 1);
                break;
              }
            }
          }
          url = arrUrl.join();
          url = url.replace(/,/g,'');
        }
        break;
      default:
        if(lang != 'uk'){
          if(url.split('/')[3] != ''){
            page = url.split('/')[3];
            url = url.replace(url.split('/')[3], lang);
            url = `${url}/${page}`;
          }else if(url.split('/')[3] == '' && url.split('/')[4] != ''){
            let arrUrl = url.split('/');
            arrUrl[3] = lang;
            url = arrUrl.join();
            url = url.replace(/,/g,'/');
          }else{
            url = url + lang
          }
        }
        break;
    }
    window.location.href = url; 
  });
});
