var $=jQuery.noConflict();

/*------------------------------------*\
	#FUNCTIONS
\*------------------------------------*/



/**
 * Load Google Map
 * @param {String} lat
 * @param {String} lon
 * @param {String} address
 */
function loadMap(lat, lon, address){
	var map;

	// Initialize map with given data.
	function initialize() {
		var mapOptions = {
			zoom: 			14,
			center: 		new google.maps.LatLng(lat, lon),
			draggable: 		false,
			scrollwheel: 	false
		};
	  	map = new google.maps.Map(document.getElementById('mapa'),
	      mapOptions);

	  	// Agregar marcador con imagen
	  	var image = theme_url+'images/marker.png';
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(lat, lon),
			map: map,
			icon: image,
			title: 'Sundland',
			anchorPoint: new google.maps.Point(0, -60)
		});

		// Agregar InfoWindow
		var contentString = '<div><h2 class="[ title ]">Sunland</h2><h3 class="[ sub-title dark ]">School of the Arts</h3></div><div><p>'+address+'</p></div>';
		var infowindow = new google.maps.InfoWindow({
			content: contentString,
			maxWidth: 200
		});

		infowindow.open(map, marker);

	}

	// Google Maps Events
	google.maps.event.addDomListener(window, 'load', initialize);

}// loadMap

/**
 * Initializes calendar
 * @param {JSON} calendarioEvents
 */
function initializeCalendar( calendarioEvents ){

	console.log( calendarioEvents );
	//Calendario Foro
	var transEndEventNames = {
			'WebkitTransition' 	: 'webkitTransitionEnd',
			'MozTransition' 	: 'transitionend',
			'OTransition' 		: 'oTransitionEnd',
			'msTransition' 		: 'MSTransitionEnd',
			'transition' 		: 'transitionend'
		},
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		$wrapper = $( '#custom-inner' ),
		$calendar = $( '#calendar' ),
		cal = $calendar.calendario( {
			onDayClick : function( $el, $contentEl, dateProperties ) {
				if( $contentEl.length > 0 ) {
					showEvents( $contentEl, dateProperties );
				}
			},
			caldata : calendarioEvents,
			displayWeekAbbr : true
		}),
		$month = $( '#custom-month' ).html( cal.getMonthName() ),
		$year = $( '#custom-year' ).html( cal.getYear() );
	$( '#custom-next' ).on( 'click', function() {
		cal.gotoNextMonth( updateMonthYear );
	} );
	$( '#custom-prev' ).on( 'click', function() {
		cal.gotoPreviousMonth( updateMonthYear );
	} );

	function updateMonthYear() {
		$month.html( cal.getMonthName() );
		$year.html( cal.getYear() );
	}

	function showEvents( $contentEl, dateProperties ) {
		hideEvents();
		var $events = $( '<div id="custom-content-reveal" class="custom-content-reveal"><h4>' + dateProperties.monthname + ' ' + dateProperties.day + ', ' + dateProperties.year + '</h4></div>' ),
			$close = $( '<span class="custom-content-close"></span>' ).on( 'click', hideEvents );
		$events.append( $contentEl.html() , $close ).insertAfter( $wrapper );
		setTimeout( function() {
			$events.css( 'top', '0%' );
		}, 25 );
	}

	function hideEvents() {
		var $events = $( '#custom-content-reveal' );
		if( $events.length > 0 ) {
			$events.css( 'top', '100%' );
			Modernizr.csstransitions ? $events.on( transEndEventName, function() { $( this ).remove(); } ) : $events.remove();
		}
	}
}// initializeCalendar

/**
 * Open accordion for a given element.
 * @param {HTML Element} elemento
 */
function openAccordion(elemento){
	var accordionBox = elemento.parent('.js-accordion-item').find('.js-accordion-box');
	var icon = elemento.closest('.js-accordion-item').find('.drop');
	if( accordionBox.hasClass('hide') ){
		$('.js-accordion-item').find('.js-accordion-box').addClass('hide');
		$('.js-accordion-item').find('.js-accordion-box').slideUp('300');
		accordionBox.slideDown('300');
		accordionBox.removeClass('hide');
		$('.js-accordion-item').find('.drop').removeClass('up');
		icon.addClass('up');
	} else {
		$('.js-accordion-item').find('.js-accordion-box').addClass('hide');
		icon.removeClass('up');
		$('.js-accordion-item').find('.js-accordion-box').slideUp('300');
	}
}// openAccordion

/**
 * Toggles Modal
 * @param element
**/
function toggleModal(element){
	$('.modal-'+element).toggleClass('hidden');
}





/*------------------------------------*\
	AJAX FUNCTIONS
\*------------------------------------*/



/**
 * Save contact form data as WP post.
 */
function saveContactPost(){
	data = $('.js-contact-form').serialize();

	$.post(
		ajax_url,
		data,
		function( response ){
			var message_json = $.parseJSON( response );

			if( message_json.error ){
				alert( message_json.message );
				return;
			}

			$('.js-form-container').empty();
			$('.js-form-container').html( '<h3>' + message_json.message + '</h3>' );
		}
	);
}// saveContactPost

/**
 * Send email requesting more information.
 */
function sendMoreInfoEmail(){
	data = $('.js-mas-info-form').serialize();

	console.log( data );
	
	$.post(
		ajax_url,
		data,
		function( response ){
			console.log(response);
			$('.close-modal').click();
			
			var message_json = $.parseJSON( response );
			if( ! message_json.error ){
				alert( message_json.message );
				return;
			}			
		}
	);
}// sendMoreInfoEmail

