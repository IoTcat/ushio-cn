(function(){if(window.jQuery===undefined){var q=document.createElement("script");q.setAttribute("type","text/javascript");
q.setAttribute("src","https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js");if(q.readyState){q.onreadystatechange=function(){if(this.readyState=="complete"||this.readyState=="loaded"){t()
}}}else{q.onload=t}(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(q)}else{jQuery=window.jQuery;
h();d();k()}function t(){jQuery=window.jQuery.noConflict(true);h();d();k()}function h(){if(window.trustedsite_loaded){return
}window.trustedsite_loaded=true;var x=0;if(parseInt(r("trustedsite_session"))==1){x=1}else{f("trustedsite_session",1,5)}var w=document.createElement("img");
w.id="trustedsite-image-bg";w.src="//cdn.ywxi.net/static/img/tm-float-bg-right-bottom.png";jQuery(w).addClass("trustedsite-floating-element");
w.style.cssText=u()+"position:fixed !important;width:100px;height:40px !important;z-index:1000002 !important;bottom:0px !important;right:0px;";
var y;if(!m()){y=document.createElement("div");jQuery(y).addClass("trustedsite-floating-element");y.style.cssText=u()+"z-index:1000001;width:36px !important;height:40px !important;position:fixed;background:#ffffff !important;opacity:0.7 !important;right:0px;bottom:0px;border-top-left-radius:3px;"
}var z=document.createElement("div");jQuery(z).addClass("trustedsite-floating-element");z.id="trustedsite-image";z.innerHTML='<img src="//cdn.ywxi.net/tm/img/float2-right.png?h=designedstudio.com&d=20160303" width="100" height="40" style="'+u()+'width:100px !important;height:40px !important;">';
z.style.cssText=u()+"position:fixed;height:40px !important;width:100px;overflow:hidden;bottom:0px;right:0px;z-index:1000003 !important;cursor:pointer !important;";
z.oncontextmenu=function(){return false};z.onmousedown=function(){j()};z.onmouseover=function(){o()};z.onmouseout=function(){e()
};if(x){w.style.right="-56px";w.style.display="none";z.style.right="-56px";if(y){document.body.appendChild(y)}}else{if(y){window.setTimeout(function(){document.body.appendChild(y)
},100)}window.setTimeout(function(){i()},2000)}document.body.appendChild(z);document.body.appendChild(w);if(p()){c();jQuery(window).scroll(function(){c()
})}b()}function o(){window.clearTimeout(v);v=0;g()}var v=0;var n=1;function e(){if(v){return}v=window.setTimeout(function(){i();
v=0},1000)}function i(){if(jQuery("#trustedsite-verify").is(":visible")){return}if(parseInt(jQuery("#trustedsite-image").css("right"))<0){console.log("Already Small");
return}n=0;jQuery("#trustedsite-image-bg").animate({right:"-56px"},400,function(){if(!n){jQuery("#trustedsite-image-bg").fadeOut(100)
}});jQuery("#trustedsite-image").animate({right:"-56px"},400)}function g(){if(parseInt(jQuery("#trustedsite-image").css("right"))>0){console.log("Already Big");
return}n=1;jQuery("#trustedsite-image-bg").show();jQuery("#trustedsite-image-bg").animate({right:"0"},200);jQuery("#trustedsite-image").animate({right:"0"},200)
}function j(){if(p()||jQuery(window).height()<=400||jQuery(window).width()<=400){window.open("https://www.mcafeesecure.com/verify?host=designedstudio.com");
return}var x=document.getElementById("trustedsite-verify");if(!x){x=document.createElement("div");x.id="trustedsite-verify";
l(x);x.style.position="fixed";x.style.boxShadow="rgba(0, 0, 0, 0.298039) 1px 1px 3px";x.innerHTML='<div style="'+u()+'height:34px;overflow:hidden;background:#f5f6f7;"><div style="'+u()+'padding:5px 0 !important;"><table style="'+u()+'" width="100%" border="0" cellspacing="0" cellpadding="0"><tr style="'+u()+'"><td style="'+u()+'padding:0 10px 0 0 !important;border-right:solid 1px #e5e6e7 !important;text-align:right !important;"><a onmouseover="this.style.color=\'#666666\'" onmouseout="this.style.color=\'#aaaaaa\'"style="text-rendering:optimizelegibility !important;font-size:11px !important;font-weight:normal !important;text-decoration:none !important;font-family:arial !important;color:#aaa;transition: color 0.2s !important;" href="https://www.mcafeesecure.com/verify?host=designedstudio.com" target="_blank">Verify &raquo;</a></td><td style="'+u()+'" width="27"><div style="cursor:pointer;transition: background 0.2s;width:27px;height:14px;background:url(//cdn.ywxi.net/static/img/vh_close_button.png) no-repeat center center;" id="trustedsite_mouseOverWin_x"></td></tr></table></div></div><iframe style="'+u()+'width:300px;height:317px;" frameborder="0" src="https://www.mcafeesecure.com/verify-float?host=designedstudio.com"></iframe>';
x.style.border="solid 1px #ccc";x.style.background="#f5f6f7";x.style.width="300px";x.style.height="351px";x.style.overflow="hidden";
x.style.margin="0";x.style.padding="0";x.style.bottom="50px";x.style.right="10px";x.style.zIndex="1000004";x.style.display="none";
document.body.appendChild(x);var w=document.getElementById("trustedsite_mouseOverWin_x");if(w){w.onclick=function(){jQuery("#trustedsite-verify").fadeOut(function(){i()
})}}}if(jQuery("#trustedsite-verify").is(":visible")){jQuery("#trustedsite-verify").fadeOut(200)}else{jQuery("#trustedsite-verify").fadeIn(200)
}}function b(){var w=r("trustedsite_visit");if(w){return}f("trustedsite_visit",1,24*60);s("https://www.mcafeesecure.com/rpc/ajax?do=tmjs-visit&siteId=1117473&rand="+(new Date().getTime()))
}function s(x){try{var w=document.createElement("script");w.setAttribute("type","text/javascript");w.setAttribute("src",x);
document.getElementsByTagName("head")[0].appendChild(w)}catch(y){}}function f(x,z,A){if(A){var y=new Date();y.setTime(y.getTime()+(A*60*1000));
var w="expires="+y.toGMTString();document.cookie=x+"="+z+"; path=/;"+w}else{document.cookie=x+"="+z+"; path=/;"}}function r(y){var x=y+"=";
var w=document.cookie.split(";");for(var z=0;z<w.length;z++){var A=a(w[z]);if(A.indexOf(x)==0){return A.substring(x.length,A.length)
}}return""}function c(){if(!p()){return}try{jQuery(".trustedsite-floating-element").css("zoom",((window.innerWidth)/(screen.width))*1)
}catch(w){}}function a(w){if(!w){return""}try{return new String(w).trim()}catch(x){return w}}function p(){return navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)
}function m(){return navigator.userAgent.match(/MSIE 8/i)||navigator.userAgent.match(/MSIE 7/i)}function l(w){try{w.style.maxWidth="none"
}catch(x){}try{w.style.minWidth="none"}catch(x){}try{w.style.maxHeight="none"}catch(x){}try{w.style.minHeight="none"}catch(x){}}function u(){return"margin:0 !important;padding:0 !important;border:0 !important;background:none !important;max-width:none !important;max-height:none !important;"
}function k(){var w="designedstudio.com";if(!w){w=location.host}try{jQuery(document).ready(function(){jQuery(".mcafeesecure-track-conversion").each(function(){if($(this).attr("data-done")){return
}$(this).attr("data-done","true");var z="https://www.mcafeesecure.com/rpc/ajax?do=track-site-conversion&jsoncallback=void&rand="+new Date().getTime()+"&h="+w+"&t="+encodeURIComponent($(this).attr("data-type"))+"&e="+encodeURIComponent($(this).attr("data-email"))+"&fn="+encodeURIComponent($(this).attr("data-firstname"))+"&ln="+encodeURIComponent($(this).attr("data-lastname"))+"&c="+encodeURIComponent($(this).attr("data-country"))+"&o="+encodeURIComponent($(this).attr("data-orderid"));
var y=document.createElement("script");y.setAttribute("type","text/javascript");y.setAttribute("src",z);document.getElementsByTagName("head")[0].appendChild(y)
})})}catch(x){ts_consolelog(x)}}function d(){jQuery(".ts-widget-rating[data-layout]").each(function(){var B=$(this).attr("data-href");
var y=$(this).attr("data-counts");var A=$(this).attr("data-layout");var D=$(this).attr("data-target");var C=parseInt($(this).attr("data-quickrate"));
var w=22;var z=80;if(!B){B="designedstudio.com"}var x="https://www.trustedsite.com/widget/3?layout="+A+"&quickRate="+C+"&showCounts="+y+"&host="+B;
if(D){x+="&target="+D}if(A=="box"||A=="vertical"){if(y==1){w+=42}}else{if(A=="button"||A=="horizontal"){if(y==1){z+=85}}else{$(this).hide();
return}}$(this)[0].style.cssText="width:"+z+"px;height:"+w+"px;overflow:hidden;border:none;margin:none;padding:none;";$(this).html('<iframe scrolling="0" style="overflow:hidden;width:'+z+"px !important;height:"+w+'px !important;border:0 !important;margin:0 !important;padding:0 !important;" src="'+x+'"></iframe')
})}})();