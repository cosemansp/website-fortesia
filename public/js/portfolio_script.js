jQuery(document).ready(function($) {	

	//===============================================	
	// 		QUICKSAND AND GALLERIFFIC
	//===============================================
	
	if( $('ul.portfolio_toggle').exists() ) {
			
		// Quicksand function
		//===============================================
		function portfolio_quicksand() {
			
			// Setting Up Our Variables
			var $filter;
			var $container;
			var $containerClone;
			var $filterLink;
			var $filteredItems
			
			// Set Our Filter
			$filter = $('.filter li.active a').attr('class');
			
			// Set Our Filter Link
			$filterLink = $('.filter li a');
			
			// Set Our Container
			$container = $('ul.portfolio_toggle').parent().find('.thumbs_container ul');
			
			// Clone Our Container
			$containerClone = $container.clone();
			
			// Apply our Quicksand to work on a click function for each for the filter li link elements
			$filterLink.click(function(e) {
				
				// Remove the active class
				$('.filter li').removeClass('active');
				
				// Split each of the filter elements and override our filter
				$filter = $(this).attr('class').split(' ');
				
				// Apply the 'active' class to the clicked link
				$(this).parent().addClass('active');
				
				// If 'all' is selected, display all elements, else output all items referenced to the data-type
				if ($filter == 'all') {
					$filteredItems = $containerClone.find('li'); 
				}
				else {
					$filteredItems = $containerClone.find('li[data-type~=' + $filter + ']'); 
				}
				
				// Finally call the Quicksand function
				$container.quicksand($filteredItems, 
				{
					duration: 700,
					easing: 'easeInOutCirc',
					adjustHeight: 'auto'
				});
				
				
				//Initalize Galleriffic slideshow Script When Filtered
				$container.quicksand($filteredItems, 
					function () { slideshow(); }
				);	
			});
			
		}
			
		// Start quicksand funtion if Quicksand is active
		if(jQuery().quicksand) {
			portfolio_quicksand();	
		}
	
	}
	
	// Galleriffic slideshow function
	//===============================================
	function slideshow() {
		$('.portfolio_container').each(function(i){
			
			// add specific id to every element in order to have multiple portfolios
			$(this).find('.thumbs_container').attr('id', 'thumbs-'+i);
			$(this).find('.controls').attr('id', 'controls-'+i);
			$(this).find('.slideshow').attr('id', 'slideshow-'+i);
			$(this).find('.caption').attr('id', 'caption-'+i);
			$(this).find('.loading').attr('id', 'loading-'+i);
			
			 var gallery = $('#thumbs-'+i).galleriffic({ 
				delay:                     6000, // in milliseconds
				numThumbs:                 999, // The number of thumbnails to show page
				preloadAhead:              0, // Set to -1 to preload all images
				enableTopPager:            false,
				enableBottomPager:         false,
				maxPagesToShow:            6,  // The maximum number of pages to display in either the top or bottom pager
				imageContainerSel:         '#slideshow-'+i, // The CSS selector for the element within which the slideshow controls should be rendered
				controlsContainerSel:      '#controls-'+i, // The CSS selector for the element within which the controls should be rendered
				captionContainerSel:       '#caption-'+i,// The CSS selector for the element within which the captions should be rendered
				loadingContainerSel:       '#loading-'+i, // The CSS selector for the element within which should be shown when an image is loading
				renderSSControls:          true, // Specifies whether the slideshow's Play and Pause links should be rendered
				renderNavControls:         true, // Specifies whether the slideshow's Next and Previous links should be rendered
				playLinkText:              "<i class='icon-play'></i>",
				pauseLinkText:             "<i class='icon-pause'></i>",
				prevLinkText:              "<i class='icon-chevron-left'></i>",
				nextLinkText:              "<i class='icon-chevron-right'></i>",
				renderSSControls:          true, // Specifies whether the slideshow's Play and Pause links should be rendered
				renderNavControls:         true, // Specifies whether the slideshow's Next and Previous links should be rendered		
				nextPageLinkText:          'Next &rsaquo;',
				prevPageLinkText:          '&lsaquo; Previous',
				enableHistory:             false, // Specifies whether the url's hash and the browser's history cache should update when the current slideshow image changes
				enableKeyboardNavigation:  false, // Specifies whether keyboard navigation is enabled
				autoStart:                 false, // Specifies whether the slideshow should be playing or paused when the page first loads
				syncTransitions:           false, // Specifies whether the out and in transitions occur simultaneously or distinctly
				defaultTransitionDuration: 500, // If using the default transitions, specifies the duration of the transitions
				onSlideChange:             undefined, // accepts a delegate like such: function(prevIndex, nextIndex) { ... }
				onTransitionOut:           undefined, // accepts a delegate like such: function(slide, caption, isSync, callback) { ... }
				onTransitionIn:            undefined, // accepts a delegate like such: function(slide, caption, isSync) { ... }
				onPageTransitionOut:       undefined, // accepts a delegate like such: function(callback) { ... }
				onPageTransitionIn:        undefined, // accepts a delegate like such: function() { ... }
				onImageAdded:              undefined, // accepts a delegate like such: function(imageData, $li) { ... }
				onImageRemoved:            undefined  // accepts a delegate like such: function(imageData, $li) { ... }	
			  });
		});
		
		// At first, slideshow container is hidden				
		$(".portfolio_preview").css('display', 'none');
		
		// When thumbnail link is clicked...		
		$(".thumb").click(function () {		
			// show slideshow container
			$(this).closest('.portfolio_container').find(".portfolio_preview").slideDown(500,"swing");
			// hide Quicksand filter links
			$(this).closest('section').find(".portfolio_toggle, .curly_brackets").slideUp(200,"swing");
			// scroll to the top where slideshow preview starts, so that loaded image is visible 
			$('html,body').animate({scrollTop: $(this).closest('section').offset().top+170}, 500);
		});
		
		// Prepend 'close' button to slideshow controls
		$('.controls').prepend('<a class="close"><i class="icon-remove"></i></a>');		
		
		// When 'close' button is clicked		
		$(".controls a.close").click(function () {
			// hide slideshow container
			$(this).closest('.portfolio_container').find(".portfolio_preview").slideUp(500,"swing");
			// show Quicksand filter links
			$(this).closest('section').find(".portfolio_toggle, .curly_brackets").slideDown(200,"swing");
			// scroll to the top of portfolio div, so that title and filter links are visible
			$('html,body').animate({scrollTop: $(this).closest('section').offset().top}, 500);
		});
				
	}
	
	// Start slideshow function	
	if( jQuery().galleriffic && $('.thumbs_container ul.thumbs li').exists()) {
		slideshow()	
	}			
				
});