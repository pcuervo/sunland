(function($){
	"use strict";
	$(function(){

		/*------------------------------------*\
			#ON LOAD
		\*------------------------------------*/
		
		/* MENU MOVIL */
		$(document).ready(function() {
		    $("#sunland-mmenu").mmenu();
		});

		/*ACCORDEON*/
		function abrirAccordion(elemento){
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
		}



		/*------------------------------------*\
			#Triggered events
		\*------------------------------------*/
		$('body').on('click', '.js-accordion-item > .js-accordion-button', function(e){
			e.preventDefault();
			abrirAccordion( $(this) );
		});



		/*------------------------------------*\
			#RESPONSIVE
		\*------------------------------------*/

	});
})(jQuery);

/*------------------------------------*\
	#FUNCTIONS
\*------------------------------------*/
function loadMap(){
	var map;
	function initialize() {
		var mapOptions = {
			zoom: 			14,
			center: 		new google.maps.LatLng(19.470724, -99.171000),
			draggable: 		false,
			scrollwheel: 	false 
		};
	  	map = new google.maps.Map(document.getElementById('map-canvas'),
	      mapOptions);

	  	// Agregar marcador con imagen
	  	var image = 'images/marker.png';
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(19.419929, -99.171208),
			map: map,
			icon: image,
			title: 'Sundland',
			anchorPoint: new google.maps.Point(0, -50)
		});

		// Agregar InfoWindow
		var contentString = '<div><h2 class="[ title ]">Sunland</h2><h3 class="[ sub-title dark ]">School of the Arts</h3></div><div><p>Cozumel #31, Col. Roma, Cuahtemoc, México D.F. CP: 06700</p></div>';
		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});

		infowindow.open(map,marker);

	}

	// Google Maps Events
	google.maps.event.addDomListener(window, 'load', initialize);
	
}// loadMap
