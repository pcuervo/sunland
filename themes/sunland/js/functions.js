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
function loadMap(lat, lon, direccion){
	var map;
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
		var contentString = '<div><h2 class="[ title ]">Sunland</h2><h3 class="[ sub-title dark ]">School of the Arts</h3></div><div><p>'+direccion+'</p></div>';
		var infowindow = new google.maps.InfoWindow({
			content: contentString,
			maxWidth: 200
		});

		infowindow.open(map, marker);

	}

	// Google Maps Events
	google.maps.event.addDomListener(window, 'load', initialize);
	
}// loadMap
