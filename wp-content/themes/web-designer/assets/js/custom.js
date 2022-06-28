function web_designer_menu_open_nav() {
	window.web_designer_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function web_designer_menu_close_nav() {
	window.web_designer_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},  
		speed: 'fast'
 	});

	new WOW().init();
});

jQuery(document).ready(function () {
	window.web_designer_currentfocus=null;
  	web_designer_checkfocusdElement();
	var web_designer_body = document.querySelector('body');
	web_designer_body.addEventListener('keyup', web_designer_check_tab_press);
	var web_designer_gotoHome = false;
	var web_designer_gotoClose = false;
	window.web_designer_responsiveMenu=false;
 	function web_designer_checkfocusdElement(){
	 	if(window.web_designer_currentfocus=document.activeElement.className){
		 	window.web_designer_currentfocus=document.activeElement.className;
	 	}
 	}
 	function web_designer_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.web_designer_responsiveMenu){
			if (!e.shiftKey) {
				if(web_designer_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				web_designer_gotoHome = true;
			} else {
				web_designer_gotoHome = false;
			}

		}else{

			if(window.web_designer_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.web_designer_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.web_designer_responsiveMenu){
				if(web_designer_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					web_designer_gotoClose = true;
				} else {
					web_designer_gotoClose = false;
				}
			
			}else{

			if(window.web_designer_responsiveMenu){
			}}}}
		}
	 	web_designer_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});

jQuery('document').ready(function(){
  var owl = jQuery('#service-section .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: true,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: false,
    dots:false,
    navText : ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});