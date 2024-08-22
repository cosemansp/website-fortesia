jQuery(document).ready(function($) {
  $('.flexslider').flexslider({		
	  animationDuration: 600,
	  directionNav: parseInt(slider_vars.directionNav),
	  controlNav: parseInt(slider_vars.controlNav),
	  prevText: "<i class='icon-chevron-left'></i>",
	  nextText: "<i class='icon-chevron-right'></i>",
	  animation: slider_vars.animation,
	  direction: slider_vars.direction, 
	  slideshowSpeed: 7000,
	  slideshow: true
  });
});