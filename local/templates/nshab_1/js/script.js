jQuery(document).ready(function($){$(function(){$("#menu").mmenu({"extensions":["effect-slide-menu","effect-slide-panels-100","pageshadow","theme-white"],"navbar":{"title":"Меню"},"navbars":[{"position":"top"},{"position":"bottom","content":["<a class='fa fa-envelope' href='#/'></a>","<a class='fa fa-twitter' href='#/'></a>","<a class='fa fa-facebook' href='#/'></a>"]}]});});$('.main_menu_small_buttom_a').click(function(){$('.main_menu_phone_items').hide(300);$('.main_menu_phone_buttom_a').removeClass('active');$('.main_menu_small_items').slideToggle(300);$(this).toggleClass('active');return false;});$('.main_menu_phone_buttom_a').click(function(){$('.main_menu_small_items').hide(300);$('.main_menu_small_buttom_a').removeClass('active');$('.main_menu_phone_items').slideToggle(300);$(this).toggleClass('active');return false;});$('.mobile-search').click(function(){$('#search-bar').toggleClass('search-open');$('.mobile-menu').removeClass('active');$('.main-nav').slideUp(500);$(this).toggleClass('active');return false;});$('a.mobile-menu').click(function(){$('.main-nav').slideToggle(300);$(this).toggleClass('active');$('#search-bar').removeClass('search-open');$('.mobile-search').removeClass('active');return false;});if($(".contacts_feedback_form .api-feedback .tpl_default_custom_field_0 select[name*='CUSTOM_FIELDS']").val()=="Полировка / Покраска"){$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_1").css('display','table-row');$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_2").css('display','table-row');$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_3").css('display','table-row');}else{$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_1").css('display','none');$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_2").css('display','none');$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_3").css('display','none');}$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_0 select[name*='CUSTOM_FIELDS']").change(function(){if($(".contacts_feedback_form .api-feedback .tpl_default_custom_field_0 select[name*='CUSTOM_FIELDS']").val()=="Полировка / Покраска"){$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_1").css('display','table-row');$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_2").css('display','table-row');$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_3").css('display','table-row');}else{$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_1").css('display','none');$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_2").css('display','none');$(".contacts_feedback_form .api-feedback .tpl_default_custom_field_3").css('display','none');}});$("#tabs").tabs();$(".owl-carousel-1_item").owlCarousel({autoWidth:false,mouseDrag:false,touchDrag:false,dots:false,lazyLoad:true,singleItem:true,});$(".owl-carousel-catalog_section").owlCarousel({autoplay:true,autoplayHoverPause:true,singleItem:true,lazyLoad:true,loop:true,navigation:true,navigationText:['предыдущий','следующий']});$(".owl-carousel-1page_works").owlCarousel({autoPlay:true,stopOnHover:true,margin:10,items:4,itemsDesktopSmall:[980,4],itemsTablet:[768,3],itemsMobile:[479,2],lazyLoad:true,loop:true,navigation:true,navigationText:['предыдущий','следующий']});$('.owl-carousel-video_main_page').owlCarousel({items:1,dots:true,loop:true,margin:10,video:true,lazyLoad:true,responsive:{768:{items:1,dots:true},1024:{items:2,dots:false}}});$(".owl-carousel-random-works").owlCarousel({loop:true,navigation:false,items:5,itemsTablet:[768,3],itemsMobile:[479,2],pagination:false,});$("#diskkreator").owlCarousel({autoPlay:true,stopOnHover:true,margin:10,items:4,lazyLoad:true,loop:true,navigation:true,navigationText:['предыдущий','следующий']});});$(function(){var $q=function(q,res){if(document.querySelectorAll){res=document.querySelectorAll(q);}else{var d=document,a=d.styleSheets[0]||d.createStyleSheet();a.addRule(q,'f:b');for(var l=d.all,b=0,c=[],f=l.length;b<f;b++)l[b].currentStyle.f&&c.push(l[b]);a.removeRule(0);res=c;}return res;},addEventListener=function(evt,fn){window.addEventListener?this.addEventListener(evt,fn,false):(window.attachEvent)?this.attachEvent('on'+evt,fn):this['on'+evt]=fn;},_has=function(obj,key){return Object.prototype.hasOwnProperty.call(obj,key);};function loadImage(el,fn){var img=new Image(),src=el.getAttribute('data-src');img.onload=function(){if(!!el.parent)el.parent.replaceChild(img,el)
else
el.src=src;fn?fn():null;}
img.src=src;}function elementInViewport(el){var rect=el.getBoundingClientRect()
return(rect.top>=0&&rect.left>=0&&rect.top<=(window.innerHeight||document.documentElement.clientHeight))}var images=new Array(),query=$q('img.lazy'),processScroll=function(){for(var i=0;i<images.length;i++){if(elementInViewport(images[i])){loadImage(images[i],function(){images.splice(i,i);});}};};for(var i=0;i<query.length;i++){images.push(query[i]);};processScroll();addEventListener('scroll',processScroll);});
$(function(){
	var ink, d, x, y;
	$(".ripplelink").click(function(e){
    if($(this).find(".ink").length === 0){
        $(this).prepend("<span class='ink'></span>");
    }
         
    ink = $(this).find(".ink");
    ink.removeClass("animate");
     
    if(!ink.height() && !ink.width()){
        d = Math.max($(this).outerWidth(), $(this).outerHeight());
        ink.css({height: d, width: d});
    }
     
    x = e.pageX - $(this).offset().left - ink.width()/2;
    y = e.pageY - $(this).offset().top - ink.height()/2;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("animate");
});
});
$(window).scroll(function() {
var height = $('#panel').outerHeight();
var hhei = 100 + height;
if ($(this).scrollTop() > hhei){  
    $('.top_contacts,.logo,.middle,.header_inner,.gamburger,.textwa').addClass("sticky");
	$('.header1').addClass("sticky FixedTop");
	$('.tflogo').addClass("tfsmall");

  }
  else{
	$('.top_contacts,.logo,.middle,.header_inner,.gamburger,.textwa').removeClass("sticky");
	$('.header1').removeClass("sticky FixedTop");
	$('.tflogo').removeClass("tfsmall");

  }
});


$(window).scroll(function() {
var window_top = $(window).scrollTop();
var heightt = $('.left_s').outerHeight();
var hheii = 150 + heightt;
var foott = $(".footer").offset().top;
var footh = $(".footer").height();
	if (window_top+338 > foott){
$('.insta').addClass("stycky_2").removeClass("stycky_l");
	}else if (window_top > hheii){  
		$('.insta').addClass("stycky_l").removeClass("stycky_2");
  }
  else{
	$('.insta').removeClass("stycky_l");
  }

});

"use strict";
$(function() {
    $(".youtube").each(function() {
        // Зная идентификатор видео на YouTube, легко можно найти его миниатюру
        $(this).css('background-image', 'url(http://i.ytimg.com/vi/' + this.id + '/sddefault.jpg)');

        // Добавляем иконку Play поверх миниатюры, чтобы было похоже на видеоплеер
        $(this).append($('<div/>', {'class': 'play'}));

        $(document).delegate('#'+this.id, 'click', function() {
            // создаем iframe со включенной опцией autoplay
            var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
            if ($(this).data('params')) iframe_url+='&'+$(this).data('params');

            // Высота и ширина iframe должны быть такими же, как и у родительского блока
            var iframe = $('<iframe/>', {'frameborder': '0', 'src': iframe_url, 'width': $(this).width(), 'height': $(this).height() })

            // Заменяем миниатюру HTML5 плеером с YouTube
            $(this).replaceWith(iframe);
        });
    });
 });