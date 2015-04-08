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

	<!-- SUNLAND STUDIOS -->
	<section class="[ wrapper ]">
		<div class="[ row ]">
			<div class="[ columna xmall-12 medium-9 large-7 ] [ margin-bottom ]">
				<h2 class="[ title ]">Xchel Ruvalcabas</h2>
			</div>
			<div class="[ columna xmall-12 medium-9 large-7 ]">
				<p>Músico, baterista mexicano de 29 años con más de 11 años de experiencia en escenarios acompañando a artistas como  Von Smith, Pambo, Christian Chávez (RBD), Belinda, Liana, Marco Durán, Lila Downs, entre otros y perteneciendo a diferentes bandas de distintos estilos.</p>
				<p>Ha tocado en diferentes conciertos, festivales y ferias a lo largo de toda la república mexicana. Ahora se estrena como líder de su propia banda en su primer disco como solista.</p>
			</div>
			<div class="[ xmall-12 margin-bottom--large ] [ clearfix ]">
				<h2 class="title">Demos</h2>
				<i class="[ icon-youtube-play ] [ icon-large ] [ highlight ]"></i> <i class="[ icon-youtube-play ] [ icon-large ] [ highlight ]"></i>
			</div>
		</div>
	</section>
	<!--  -->

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