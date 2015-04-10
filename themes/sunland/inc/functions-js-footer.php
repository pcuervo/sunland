<?php


	/**
	* Here we add all the javascript that needs to be run on the footer.
	**/
	function footer_scripts(){
		global $post;

		if( wp_script_is( 'functions', 'done' ) ) {
?>
			<script type="text/javascript">
				(function( $ ) {
					"use strict";
					$(function(){

						<?php
						if( 'contacto' == $post->post_name || is_home() ) {
							$coord = get_map_coordinates();
							$lat = $coord['lat'];
							$lon = $coord['lon'];
							$direccion = get_info_general( 'direccion' );
						?>
							loadMap('<?php echo $lat ?>', '<?php echo $lon ?>', '<?php echo $direccion ?>');
						<?php } ?>





						<?php if ( is_page('foro-sunland') ) { ?>
							/*------------------------------------*\
								#PAGE FORO SUNLAND
							\*------------------------------------*/

							/**
							 * On load
							**/

							//Calendario Foro
							console.log('//');

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

							/**
							 * Triggered events
							**/


						<?php } ?>
					});
				}(jQuery));
			</script>

	<?php }
	}// footer_scripts