!function(e){var t={};function n(s){if(t[s])return t[s].exports;var o=t[s]={i:s,l:!1,exports:{}};return e[s].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,s){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:s})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var s=Object.create(null);if(n.r(s),Object.defineProperty(s,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(s,o,function(t){return e[t]}.bind(null,o));return s},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=6)}({0:function(e,t){$(document).ready((function(){$("#menuToggle").click((function(){$(".settings").hasClass("open")&&$(".settings").removeClass("open"),$("#menuToggle").toggleClass("active"),$(".menu-wrapper").toggleClass("active"),$("#menuToggle").hasClass("active")?$("#menuToggle").attr("aria-expanded","true"):$("#menuToggle").attr("aria-expanded","false")})),$(window).width()>991?($(".settings-btn").hover((function(){$(".settings").addClass("open")})),$(".settings").hover((function(){$(this).addClass("open")})),$(".settings-btn").mouseleave((function(){$(".settings").removeClass("open")})),$(".settings").mouseleave((function(){$(this).removeClass("open")}))):($(".settings-btn").click((function(){$("#menuToggle").hasClass("active")&&$("#menuToggle").toggleClass("active"),$(".menu-wrapper").hasClass("active")&&$(".menu-wrapper").toggleClass("active"),$(".settings").hasClass("open")?$(".settings").removeClass("open"):$(".settings").addClass("open")})),$(".settings-btn").mouseleave((function(){$(".settings").removeClass("open")}))),$(".btnLang").click((function(){let e=$(this)[0].id,t=new XMLHttpRequest;t.open("GET","/src/php/setLang.php?lang="+e,!0),t.onload=function(){200==this.status&&(localStorage.setItem("lang",e),$(".btnLang").removeClass("active"),$("#"+localStorage.getItem("lang")).addClass("active"))},t.send();let n=window.location.href,s=e.toLowerCase(),o="";switch(n.split("/")[3]){case"nl":if("uk"==s){n=n.replace(n.split("/")[3],""),arrUrl=n.split(""),amount=arrUrl.length;let e=!1,t=!1;for(let n=0;n<amount;n++)if("/"==arrUrl[n])if(e){if(t){arrUrl.splice(n,1);break}t=!0}else e=!0;n=arrUrl.join(),n=n.replace(/,/g,"")}break;default:if("uk"!=s)if(""!=n.split("/")[3])o=n.split("/")[3],n=n.replace(n.split("/")[3],s),n=n+"/"+o;else if(""==n.split("/")[3]&&""!=n.split("/")[4]){let e=n.split("/");e[3]=s,n=e.join(),n=n.replace(/,/g,"/")}else n+=s}window.location.href=n}))}))},6:function(e,t,n){"use strict";n.r(t);n(0);$(".down").click((function(e){e.preventDefault();let t=$(".down");$("html, body").animate({scrollTop:t.offset().top+55})}))}});