<?php

	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$images = get_attached_media( 'image' );
?>

	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo $cover_url[0] ?>)">
		<div class="[ opacity-gradient main-tile ]">
		</div>
	</div>

	<!-- INTENSIVO -->
	<section class="[ wrapper ]">
		<div class="[ xmall-12 medium-9 ]">
			<div class="[ padding ] [ relative ]">
				<h1 class="[ title ]"><?php the_title(); ?></h1>
				<div class="[ margin-bottom ]">
					<?php the_content(); ?>
				</div>
				<div class="[ text-right ]">
					<a href="<?php echo THEMEPATH; ?>pdf/programa_intensivo_artes_escenicas.pdf" class="button button--highlight" target="_blank">Descarga la información</a>
				</div>
			</div>
		</div>
	</section>
	<div class="[ clear ]"></div>

	<!-- CALL TO ACTION -->
	<section class="[ bg-highlight ][ margin-bottom ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 ] [ padding ] [ text-center ][ center block ]">
					<h3 class="[ sub-title ] [ text-center ] [ inline-block align-middle ] [ padding ]">Envíanos tu solicitud de inscripción</h2><div class="[ inline-block block align middle ] [ text-center ][ padding ]"><a href="#" class="[ button button--medium button--dark ] [ padding ][ js-modal-opener ]" data-modal="natural-form">enviar</a></div>
				</div>
			</div>
		</div>
	</section><!-- CALL TO ACTION -->

	<section>
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<!-- GALERÍA -->
				<article class="[ bg-highlight ]">
					<?php
					$content = $post->post_content;
					if( has_shortcode( $content, 'gallery' ) ) {
						$galleries = get_galleries_from_content($content);
						foreach ($galleries as $gallery => $galleryIDs) { ?>
							<div class="[ span xmall-12 margin-bottom--large ]">
								<div class="[ row ]">
									<?php
									$images = sga_gallery_images('medium', $galleryIDs);

									foreach ($images as $key => $image) {
										$imageID                   = $image[4];
										$imageURL                  = $image[0];
										$galeria_img_url_thumbnail = wp_get_attachment_image_src( $imageID, 'medium' );
										$galeria_img_url_full      = wp_get_attachment_image_src( $imageID, 'full' );

										?>
										<div class="[ columna xmall-12 medium-4 large-3 ]">
											<a class="[ fancybox ]" rel="group" href="<?php echo $galeria_img_url_full[0] ?>">
												<img class="[ image-responsive ][ margin-bottom ]" src="<?php echo $galeria_img_url_thumbnail[0]; ?>" />
											</a>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php }
					} ?>
				</article>
			</div>
		</div>
	</section><!-- GALERÍA -->
	<div class="[ clear ]"></div>

	<!-- INSTRUCTORES -->
	<section class="[ hidden--xmall shown--medium ] [ bg-dark ]">
		<div class="wrapper">
			<div class="[ row ]">
				<div class="[ span xmall-10 ] [ center block ] [ margin-bottom ]">
					<h2 class="[ title ] [ text-center ] [ padding ]">Instructores del programa intensivo</h2>
				</div>
				<?php
				$instructores_args = array(
					'post_type' 		=> 'instructores',
					'posts_per_page' 	=> -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'tipo-de-staff',
							'field'    => 'slug',
							'terms'    => array( 'intensivo' ),
						),
					),
				);
				$query_instructores = new WP_Query( $instructores_args );
				if ( $query_instructores->have_posts() ) : while ( $query_instructores->have_posts() ) : $query_instructores->the_post();

					$instructor_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				?>
					<div class="[ span xmall-12 medium-4 large-3 ] [ padding ]">
						<div class="[ bg-light ] [ relative ] [ instructor-image ]">
							<div class="[ text-center ] [ center-full ][ xmall-11 ][ z-index-10 ]">
								<a href="<?php the_permalink() ?>" class="[ button button--large button--highlight ]">ver perfil</a>
							</div>
							<img src="<?php echo $instructor_img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
						</div>
						<h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
	</section><!-- INSTRUCTORES -->

<?php
	get_footer();
?>