!function(e){var t={};function n(o){if(t[o])return t[o].exports;var a=t[o]={i:o,l:!1,exports:{}};return e[o].call(a.exports,a,a.exports,n),a.l=!0,a.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)n.d(o,a,function(t){return e[t]}.bind(null,a));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=4)}([function(e,t){$(document).ready((function(){localStorage.getItem("lang")?$("#"+localStorage.getItem("lang")).addClass("active"):(console.log("Test"),$("#UK").addClass("active"),localStorage.setItem("lang","UK")),$("#menuToggle").click((function(){$("#menuToggle").toggleClass("active"),$(".menu-wrapper").toggleClass("active"),$("#menuToggle").hasClass("active")?$("#menuToggle").attr("aria-expanded","true"):$("#menuToggle").attr("aria-expanded","false")})),$(".settings-btn").hover((function(){$(".settings").addClass("open")})),$(".settings").hover((function(){$(this).addClass("open")})),$(".settings-btn").mouseleave((function(){$(".settings").removeClass("open")})),$(".settings").mouseleave((function(){$(this).removeClass("open")})),$(".btnLang").click((function(){let e=$(this)[0].id,t=new XMLHttpRequest;t.open("GET","/src/php/setLang.php?lang="+e,!0),t.onload=function(){200==this.status&&(localStorage.setItem("lang",e),$(".btnLang").removeClass("active"),$("#"+localStorage.getItem("lang")).addClass("active"))},t.send()}))}))},,,,function(e,t,n){"use strict";n.r(t);n(0)}]);