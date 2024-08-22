jQuery(document).ready(function($) {
	
	$("#google_map").css('display', 'none');
	$(".google_map").click(function () {
		
	  $('html,body').animate({scrollTop: $(this).closest('section').offset().top+150}, 500);				
		
	   $(this).closest('h2').slideUp(300,"swing");
	   $('#google_map').slideToggle(function initialize() {
	
		  var styles = [
			{
			  featureType: "all",
				stylers: [
				  { saturation: parseInt(map_vars.saturation) },
				  { lightness: 20 },
			  ]
			}
		  ];
		  
		  var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});
			
		  var myLatlng = new google.maps.LatLng(parseFloat(map_vars.lat), parseFloat(map_vars.lng));
		  		 
		  var mapOptions = {
			zoom:parseInt(map_vars.zoom),
			streetViewControl: false,
			panControl: false,
			scaleControl: false,
			mapTypeControl: false,
			zoomControl: true,
			center: myLatlng,
		  };
		  
		  var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);	
		  var marker;
		  
		  var image = map_vars.marker;
		  				
		  marker = new google.maps.Marker({
			map:map,
			animation: google.maps.Animation.DROP,
			position: myLatlng,
			icon: image,
		  });
		  
		  map.mapTypes.set('map_style', styledMap);
		  map.setMapTypeId('map_style');
				
		});
	});	
	
	$("#google_map").prepend("<a class='close'><i class='icon-remove'></i></a><br class='clear'/>");	
	$("#google_map .close").click(function () {
		
		$('html,body').animate({scrollTop: $(this).closest('section').offset().top}, 500);				
		$('#google_map').slideUp(300,"swing");
		$(".google_map").closest('h2').slideDown(200,"swing");
		
	});	
})