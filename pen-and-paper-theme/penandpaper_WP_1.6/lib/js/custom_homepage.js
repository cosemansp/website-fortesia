jQuery(document).ready(function($) {	

	//===============================================	
	// 		WAYPOINT SCROLLING
	//===============================================
			
	// Set waypoints for slides
	$('.slide').waypoint({ offset: '50%' });

	$('body').delegate('.slide', 'waypoint.reached', function(event, direction) {
		var $active = $(this);
		
		if (direction === "up") {
			$active = $active.prev();
		}
		if (!$active.length) $active.end();
		
		// Remove or add 'section-active' class to slides
		$('.section-active').removeClass('section-active');
		$active.addClass('section-active');
		
		// Remove or add 'active' class to navigation list items
		$('ul.navigation .active').removeClass('active');
		$('a[href=#'+$active.attr('id')+']').parent().addClass('active');
	});
	
	
	// Add 'active' class to navigation list item when clicked
	$('.navigation li').click(function() {
		$(this).addClass('active');
	}).eq(0).addClass('active');	
	
	
	var scrollElement = 'html, body';
	$('html, body').each(function () {
		var initScrollTop = $(this).attr('scrollTop');
		$(this).attr('scrollTop', initScrollTop + 1);
		if ($(this).attr('scrollTop') == initScrollTop + 1) {
			scrollElement = this.nodeName.toLowerCase();
			$(this).attr('scrollTop', initScrollTop);
			return false;
		}    
	});	
	
	// Smooth scrolling for internal links
	$("a[href^='#']").click(function(event) {
		event.preventDefault();
		
		var $this = $(this),
		target = this.hash,
		$target = $(target);
		
		$(scrollElement).stop().animate({
			'scrollTop': $target.offset().top
		}, 1000, 'swing', function() {
			window.location.hash = target;
		});
		
	});

});