!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=4)}([function(e,t){$(document).ready((function(){$("#menuToggle").click((function(){$("#menuToggle").toggleClass("active"),$(".menu-wrapper").toggleClass("active"),$("#menuToggle").hasClass("active")?$("#menuToggle").attr("aria-expanded","true"):$("#menuToggle").attr("aria-expanded","false")})),$(".settings-btn").hover((function(){$(".settings").addClass("open")})),$(".settings").hover((function(){$(this).addClass("open")})),$(".settings-btn").mouseleave((function(){$(".settings").removeClass("open")})),$(".settings").mouseleave((function(){$(this).removeClass("open")})),$(".btnLang").click((function(){let e=$(this)[0].id,t=new XMLHttpRequest;t.open("GET","/src/php/setLang.php?lang="+e,!0),t.onload=function(){200==this.status&&(localStorage.setItem("lang",e),$(".btnLang").removeClass("active"),$("#"+localStorage.getItem("lang")).addClass("active"))},t.send();let n=window.location.href,r=e.toLowerCase(),o="";switch(n.split("/")[3]){case"nl":if("uk"==r){n=n.replace(n.split("/")[3],""),arrUrl=n.split(""),amount=arrUrl.length;let e=!1,t=!1;for(let n=0;n<amount;n++)if("/"==arrUrl[n])if(e){if(t){arrUrl.splice(n,1);break}t=!0}else e=!0;n=arrUrl.join(),n=n.replace(/,/g,"")}break;default:if("uk"!=r)if(""!=n.split("/")[3])o=n.split("/")[3],n=n.replace(n.split("/")[3],r),n=n+"/"+o;else if(""==n.split("/")[3]&&""!=n.split("/")[4]){let e=n.split("/");e[3]=r,n=e.join(),n=n.replace(/,/g,"/")}else n+=r}window.location.href=n}))}))},,,,function(e,t,n){"use strict";n.r(t);n(0)}]);