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
						/*------------------------------------*\
							#ALL PAGES
						\*------------------------------------*/

						/**
						 * On load
						**/

						// Toggle mobile menu
						$("#sunland-mmenu").mmenu();

						//Natural language form
						var nlform = new NLForm( document.getElementById( 'nl-form' ) );
						$('#nl-form').validate({
							submitHandler:function(){
								sendMoreInfoEmail();
							}
						});

						/**
						 * Triggered events
						**/

						$('body').on('click', '.js-accordion-item > .js-accordion-button', function(e){
							e.preventDefault();
							openAccordion( $(this) );
						});

						$('.js-modal-opener').on('click', function(e){
							e.preventDefault();
							var modal = $(this).data('modal');
							toggleModal(modal);
						});

						$('.close-modal').on('click', function(event) {
							$('.modal-wrapper').toggleClass('hidden');
						});




						/*------------------------------------*\
							#HOME
						\*------------------------------------*/

						<?php if( is_home() ) { ?>

							/**
							 * On load
							**/
							var min_w = 300; // minimum video width allowed
							var vid_w_orig;  // original video dimensions
							var vid_h_orig;
							vid_w_orig = parseInt( $('.bg-video').innerWidth() );
							vid_h_orig = parseInt( $('.bg-video').innerHeight() );

							$(window).resize(function () { resizeToCover(min_w, vid_w_orig, vid_h_orig); });
							$(window).trigger('resize');


							/**
							 * Triggered events
							**/


						<?php } ?>




						/*------------------------------------*\
							#PAGE HOME/CONTACTO
						\*------------------------------------*/

						<?php if( 'contacto' == $post->post_name || is_home() ) { ?>

							/**
							 * On load
							**/

							<?php
								$coord = get_map_coordinates();
								$lat = $coord['lat'];
								$lon = $coord['lon'];
								$direccion = get_info_general( 'direccion' );
							?>
							loadMap('<?php echo $lat ?>', '<?php echo $lon ?>', '<?php echo $direccion ?>');

							/**
							 * Triggered events
							**/
							$('.js-contact-form').validate({
								submitHandler:function(){
									saveContactPost();
								}
							});

						<?php } ?>

						/*------------------------------------*\
							#TALLERES
						\*------------------------------------*/

						<?php if( is_page('musica') OR is_page('treatro') OR is_page('danza') ) { ?>

							/**
							 * On load
							**/
							$('.fancybox').fancybox();

						<?php } ?>

						/*------------------------------------*\
							#STUDIOS
						\*------------------------------------*/

						<?php if( is_page('sunland-studios') ) { ?>

							/**
							 * On load
							**/
							$('.fancybox').fancybox();

						<?php } ?>

						/*------------------------------------*\
							#EXPRESS
						\*------------------------------------*/

						<?php if( is_page('sunland-express') ) { ?>

							/**
							 * On load
							**/
							$('.fancybox').fancybox();

						<?php } ?>

						/*------------------------------------*\
							#INTENSIVO
						\*------------------------------------*/

						<?php if( is_page('intensivo') ) { ?>

							/**
							 * On load
							**/
							$('.fancybox').fancybox();

						<?php } ?>



						/*------------------------------------*\
							#PAGE FORO SUNLAND
						\*------------------------------------*/
						<?php if ( is_page('foro-sunland') ) { ?>

							/**
							 * On load
							**/

							$('.video-wrapper').fitVids();

							<?php
								$eventos = get_events();
							?>
							var eventos = <?php echo $eventos ?>;
							initializeCalendar( eventos );

							/**
							 * Triggered events
							**/

						<?php } ?>

					});
				}(jQuery));
			</script>
	<?php }
	}// footer_scripts