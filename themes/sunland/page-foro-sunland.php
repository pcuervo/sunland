<?php
	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$images = get_attached_media( 'image' );
?>

	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo $cover_url[0] ?>)">
		<div class="[ opacity-gradient banner-height ]">
		</div>
	</div>

	<!-- INFO -->
	<section class="[ info ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 medium-9 large-7 ] [ margin-bottom ]">
					<h2 class="[ title ]">Foro Sunland</h2>
				</div>
				<div class="[ columna xmall-12 medium-9 large-7 ]">
					<p>Músico, baterista mexicano de 29 años con más de 11 años de experiencia en escenarios acompañando a artistas como  Von Smith, Pambo, Christian Chávez (RBD), Belinda, Liana, Marco Durán, Lila Downs, entre otros y perteneciendo a diferentes bandas de distintos estilos.</p>
					<p>Ha tocado en diferentes conciertos, festivales y ferias a lo largo de toda la república mexicana. Ahora se estrena como líder de su propia banda en su primer disco como solista.</p>
				</div>
			</div><!-- row -->
		</div><!-- wrapper -->
	</section> <!-- INFO -->


	<!-- CALENDAR -->
	<section class="[ calendar ]">
		<div class="[ wrapper ]">
			<div class="main_body_events_calendar calendarioContainer" >
				<div class="custom-calendar-wrap">
					<div id="custom-inner" class="custom-inner">
						<div class="custom-header clearfix">
							<nav>
								<span id="custom-prev" class="custom-prev"><i class="fa fa-caret-left"></i> <i class="[ texto ]">Mes anterior</i></span>
								<span id="custom-next" class="custom-next"><i class="[ texto ]">Mes siguiente</i> <i class="fa fa-caret-right"></i></span>
							</nav>
							<h2 id="custom-month" class="custom-month"></h2>
							<h3 id="custom-year" class="custom-year"></h3>
						</div>
						<div id="calendar" class="fc-calendar-container"></div>
					</div>
				</div>
			</div>
		</div><!-- wrapper -->
	</section> <!-- CALENDAR -->



	<!-- CALL TO ACTION -->
	<section class="[ bg-dark ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 ] [ padding ] [ text-center ][ center block ]">
					<h3 class="[ sub-title ] [ text-center ] [ inline-block align-middle ] [ padding ]">Conoce más acerca de Sunland Express</h2><div class="[ inline-block block align middle ] [ text-center ][ padding ]"><a href="#" class="[ button button--medium button--highlight ] [ padding ]">más información</a></div>
				</div>
			</div>
		</div>
	</section>
<?php
	get_footer();
?>