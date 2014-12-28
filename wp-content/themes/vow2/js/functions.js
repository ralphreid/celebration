

// If JavaScript is enabled remove 'no-js' class and give 'js' class
jQuery('html').removeClass('no-js').addClass('js');

// Add .osx class to html if on Os/x
if (navigator.appVersion.indexOf("Mac") !== -1) {
  jQuery('html').addClass('osx');
}
// When DOM is fully loaded
jQuery(document).ready(function($) {
  "use strict";  


$('.animated').appear(function() {
  $(this).each(function(){   
    $(this).css('visibility','visible');
    $(this).addClass($(this).data('type'));
  });
},{accY: -150});

  
$('p:empty').remove(); // remove empty paragraphs.



/* PRETTYPHOTO */
$('a[data-rel]').each(function() {
      $(this).attr('rel', $(this).data('rel'));
    });
$("a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', slideshow: 5000, autoplay_slideshow: false, social_tools: false, deeplinking:false}); 




/* STICKY */

$('.navbar').sticky({topSpacing:15});


/* nav */ 

$('.menu-item-object-page a').addClass('ext');
  
$('.home .navbar,.select-menu-home').onePageNav({
  currentClass: 'active',
  changeHash: false,
  scrollSpeed: 750,
  scrollOffset: 60,
  scrollThreshold: 0.1,
  filter: ':not(.ext)',
  easing: 'swing',
});

/* MOBILE MENU  */
  $("<option />", {
    "selected": "selected",
    "value"   : "",
    "text"    : "Navigation"
  }).appendTo(".select-menu");


  $(".nav a").each(function() {
    var select = $(this);
    $("<option />", {
        "value"   : select.attr("href"),
        "text"    : select.attr("title")
    }).appendTo(".select-menu");
  });
  
  $('.select-menu-page').change(function() {
    var href = $(this).find("option:selected").val();
    
    window.location = href;
    
  });
  
 /* owl carousel - for blog */
 
  $(".carousel-top-navigation").owlCarousel({
      slideSpeed : 600,
      paginationSpeed: 2000, 
      autoPlay: false,
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [980,2],
      itemsTablet: [768,2],
      itemsMobile : [568,1],
      navigation:true,
      pagination:false,
      navigationText : false
  }); 
  
 var detectmob = false; 
   if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {              
      detectmob = true;
  }


  if (detectmob === true) {
    $( '.home-parallax' ).each(function(){
        $(this).addClass('parallax-mobile');
    });
  }
  else {
  
  //.parallax(xPosition, speedFactor, outerHeight) options:
  //xPosition - Horizontal position of the element
  //inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
  //outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport

      $( '.home-parallax' ).parallax("10%", 0.1,true);
    }  


 jQuery(".player").mb_YTPlayer();

/* SCROLL */

  
$(".select-menu").change(function() {
    var href = $(this).find("option:selected").val();
    var hash = href.split("#");
    console.log(hash);
    if(href.indexOf("#") > -1) {
      $('html, body').animate({
        scrollTop: $('#'+hash[1]).offset().top
      }, 750, function(){
          window.location.hash = $(this).find("option:selected").val();
      });
    }
    else {
      window.location = href;
    }
  });



/* FITTEXT */   
    $(".fittext1").fitText(1, { minFontSize: '15px', maxFontSize: '30px' });
    $(".fittext2").fitText(0.4, { minFontSize: '30px', maxFontSize: '86px' });
    $(".fittext3").fitText(0.4, { minFontSize: '15px', maxFontSize: '45px' });
    $(".fittext4").fitText(1.5, { minFontSize: '15px', maxFontSize: '24px' });

/* External Links */  

  (function() {
      $(window).load(function() {
      $('a[rel=external]').attr('target','_blank'); 
    });                                            
  })();  


/*  Flex Initialize */  

$(window).load(function() {
 
  /*header carousel slider */
  $('.slider1').flexslider({
    animation: "slide",
    animationLoop: true,
    itemWidth: 300, 
    itemMargin: 0,
    slideshow: true,
    useCSS : false,
    directionNav: false
  });


  /* gallery slider */
  $('.flexslider').flexslider({ 
    animation: "slide",
    slideshow: false,
    useCSS : false,
    directionNav: false
  });
  
  $('.bottom-nav-content-slider').flexslider({
    animation: "slide",
    slideshow: false,
    useCSS : false,
    prevText: "",
    nextText: "",
    animationLoop: true 
  });
  
     
  // center nav slider
  $('.center-nav-content-slider').flexslider({
    animation: "slide",
    slideshow: true,
    useCSS : false,
    prevText: "",
    nextText: "",    
    animationLoop: true 
  });
 

});





/* preloading */
 
$(window).load(function() {
  
  console.log('loaded');
  $("#loadind").fadeOut();
  $("#loading-wrap").delay(150).fadeOut("fast");
  
});
 

// color picker


$(".color-1" ).click(function(){
  $("#vow-color-css" ).attr("href", "http://entiri.com/vow_wp2/wp-content/themes/vow2/css/color/color-1.css" );
  return false;
});

    
$(".color-2" ).click(function(){
  $("#vow-color-css" ).attr("href", "http://entiri.com/vow_wp2/wp-content/themes/vow2/css/color/color-2.css" );
  return false;
});
    
$(".color-3" ).click(function(){
  $("#vow-color-css" ).attr("href", "http://entiri.com/vow_wp2/wp-content/themes/vow2/css/color/color-3.css" );
  return false;
});

$(".color-4" ).click(function(){
  $("#vow-color-css" ).attr("href", "http://entiri.com/vow_wp2/wp-content/themes/vow2/css/color/color-4.css" );
  return false;
});

$(".color-5" ).click(function(){
  $("#vow-color-css" ).attr("href", "http://entiri.com/vow_wp2/wp-content/themes/vow2/css/color/color-5.css" );
  return false;
});

$(".color-6" ).click(function(){
  $("#vow-color-css" ).attr("href", "http://entiri.com/vow_wp2/wp-content/themes/vow2/css/color/color-6.css" );
  return false;
});

$(".color-7" ).click(function(){
  $("#vow-color-css" ).attr("href", "http://entiri.com/vow_wp2/wp-content/themes/vow2/css/color/color-7.css" );
  return false;
});

$(".color-8" ).click(function(){
  $("#vow-color-css" ).attr("href", "http://entiri.com/vow_wp2/wp-content/themes/vow2/css/color/color-8.css" );
  return false;
});


$('.color-picker').animate({right: '-239px'});
 
$('.color-picker a.handle').click(function(e){
  e.preventDefault();
  var div = $('.color-picker');
  if (div.css('right') === '-239px') {
    $('.color-picker').animate({right: '0px'}); 
  } 
  else {
    $('.color-picker').animate({right: '-239px'});
  }
});


}); 