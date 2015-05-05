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
						console.log('<?php echo $section ?>')
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
							$('.js-contact-form button').on('click', function(e){
								e.preventDefault();
								saveContactPost();
							});

							$('.form-contacto').validate();

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
							var evento_php = <?php echo $eventos ?>;
							var evento = '"<div class="[ evento ] [ clearfix ]"> \
							<p class="titulo">- Jazz Alternativo</p> \
							<p class="hora"><i class="fa fa-clock-o"></i> </p> \
							<a href="#" class="[ boton ] [ abrir-info ]">más info</a> \
							<div class="[ evento-full ]"> \
							<span class="custom-content-close"></span> \
							<h4 class="titulo">Jazz Alternativo</h4> \
							<p class="hora"><i class="fa fa-clock-o"></i> 9am</p> \
							<p class="contenido"><i class="fa fa-newspaper-o"></i> Si mire le puedo mostrar lo que es el jazz alternativo.</p> \
							<p class="url"><i class="fa fa-link"></i> <a href="http://localhost:8888/sunland/eventos/jazz-alternativo/" target="_blank"></a></p>  \
								</div> \
							</div>"';
							var calendarioEvents = {
								'04-09-2015' : evento
							};

							initializeCalendar( evento_php );

							/**
							 * Triggered events
							**/

						<?php } ?>

					});
				}(jQuery));
			</script>
	<?php }
	}// footer_scripts